<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Earning;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // 
    protected $today;
    protected $thisMonth;
    protected $lastMonth;
    protected $lastAgoMonth;
    protected $thisYear;
    protected $lastYear;
    protected $lastAgoYear;

    public function __construct()
    {
        $this->today = Carbon::today();
        $this->thisMonth = Carbon::now()->startOfMonth();
        $this->lastMonth = Carbon::now()->subMonth()->startOfMonth();
        $this->lastAgoMonth = Carbon::now()->subMonths(2)->startOfMonth();
        $this->thisYear = Carbon::now()->year;
        $this->lastYear = Carbon::now()->subYear()->startOfYear();
        $this->lastAgoYear = Carbon::now()->subYears(2)->startOfYear();
    }

    public function index()
    {

        $queryStatus = isset($_GET['query']) ? $_GET['query'] : '';
        // seledted sort query
        $selectedQuery = '';
        if (!empty($queryStatus)) {
            $selectedQuery = $queryStatus;
        }

        $customers = Customer::with('projects')->whereHas('projects', function ($query) {
            $query->whereBetween('end_date', [now(), now()->addDays(5)]);
        })->get();

        $tasks = $this->getTaskUpComming();
        $earnings = Earning::with('customer')->paginate(12);

        // earning expenses per month graph
        $earnExpenGraph = []; 
        $earnExpenGraph['earningPerMonth'] = $this->getEarningPerMonth();
        $earnExpenGraph['expensePerMonth'] = $this->getExpensePerMonth();

        // project status graph
        $projectStatusGraph = []; 
        $projectStatusGraph = $this->getProjectStatus(); 
 
        $data = [
            'totalEarning'          => $this->getTotalEarning($selectedQuery),
            'totalTax'              => $this->getTotalTax($selectedQuery),
            'totalProfit'           => $this->getTotalProfit($selectedQuery),
            'totalCustomer'         => $this->getTotalCustomer($selectedQuery),
            'totalNewCustomer'      => $this->getNewCustomer(),
            'totalRepeatCustomer'      => $this->getRepeatCustomer(),
        ];

        return view('dashboard/index', compact('earnings', 'tasks', 'customers', 'selectedQuery', 'data','earnExpenGraph','projectStatusGraph'));
    }

    // query map for sort
    private function getQueryMap()
    {
        $queryMap = [
            'last_month' => [
                'earning' => ['year' => $this->lastMonth->year, 'month' => $this->lastMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ],
            'this_year' => [
                'earning' => ['year' => $this->thisYear],
                'compare' => ['year' => $this->lastYear->year]
            ],
            'last_year' => [
                'earning' => ['year' => $this->lastYear->year],
                'compare' => ['year' => $this->lastAgoYear->year]
            ],
            'this_month' => [
                'earning' => ['year' => $this->thisMonth->year, 'month' => $this->thisMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ],
            'all_time' => [
                'earning' => ['year' => 2024, 'month' => 1],
                'compare' => ['year' => 2024, 'month' => 1]
            ],
            '' => [
                'earning' => ['year' => $this->thisMonth->year, 'month' => $this->thisMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ]
        ];

        return $queryMap;
    }

    // all query to get amount and compare
    private function getAmounts($queryStatus, $field, $type)
    {
        $queryMap = $this->getQueryMap();

        $amount = array_sum(
            Earning::whereYear('created_at', $queryMap[$queryStatus]['earning']['year'])
                ->when(isset($queryMap[$queryStatus]['earning']['month']), function ($query) use ($queryMap, $queryStatus) {
                    $query->whereMonth('created_at', $queryMap[$queryStatus]['earning']['month']);
                })
                ->whereIn('pay_services', $type)
                ->pluck($field)
                ->toArray()
        );

        $compareAmount = array_sum(
            Earning::whereYear('created_at', $queryMap[$queryStatus]['compare']['year'])
                ->when(isset($queryMap[$queryStatus]['compare']['month']), function ($query) use ($queryMap, $queryStatus) {
                    $query->whereMonth('created_at', $queryMap[$queryStatus]['compare']['month']);
                })
                ->whereIn('pay_services', $type)
                ->pluck($field)
                ->toArray()
        );

        $compare = ($compareAmount != 0) ? round((($amount - $compareAmount) / $compareAmount) * 100, 2) : 0;

        return [$field . 'Compare' => $compare, $field . 'Earning' => $amount];
    }

    // Get total earning
    private function getTotalEarning($queryStatus)
    {
        $type = ['hosting', 'marketing', 'website', 'project'];
        return $this->getAmounts($queryStatus, 'amount', $type);
    }

    // Get total tax
    private function getTotalTax($queryStatus)
    {
        $type = ['hosting', 'marketing', 'website', 'project'];
        return $this->getAmounts($queryStatus, 'tax', $type);
    }

    // Get total profit
    private function getTotalProfit($queryStatus)
    {
        $earning = $this->getTotalEarning($queryStatus);
        $tax = $this->getTotalTax($queryStatus);

        $amountEarning = $earning['amountEarning'];
        $taxEarning = $tax['taxEarning'];

        $amountCompare = $earning['amountCompare'];
        $taxCompare = $tax['taxCompare'];

        $totalProfit = $amountEarning - $taxEarning;

        $profitCompare = $taxCompare - $amountCompare;

        return ['profitCompare' => $profitCompare, 'totalProfit' => $totalProfit];
    }

    // get total unique customer from earning table
    private function getTotalCustomer($queryStatus)
    {

        $queryMap = $this->getQueryMap();

        // Count unique customers for the current period
        $hostingCustomersCount = Earning::select('customer_id')
            ->whereYear('created_at', $queryMap[$queryStatus]['earning']['year'])
            ->when(isset($queryMap[$queryStatus]['earning']['month']), function ($query) use ($queryMap, $queryStatus) {
                $query->whereMonth('created_at', $queryMap[$queryStatus]['earning']['month']);
            }) 
            ->distinct()
            ->count('customer_id');

        // Comparison logic
        $compareEarningYear = $queryMap[$queryStatus]['compare']['year'];
        $compareEarningMonth = $queryMap[$queryStatus]['compare']['month'] ?? null;

        // Count unique customers for the comparison period
        $compareCustomersCount = Earning::select('customer_id')
            ->whereYear('created_at', $compareEarningYear)
            ->when($compareEarningMonth, function ($query) use ($compareEarningMonth) {
                $query->whereMonth('created_at', $compareEarningMonth);
            }) 
            ->distinct()
            ->count('customer_id');

        // Return the counts
        return [
            'hostingcustomers' => $hostingCustomersCount,
            'hostingcustomersCompare' => $compareCustomersCount
        ];
    }

    private function getNewCustomer()
    {
        $sevenDaysAgo = Carbon::now()->subDays(7);

        $newCustomers = Earning::select('customer_id')
            ->whereBetween('created_at', [$sevenDaysAgo, Carbon::now()])
            ->distinct()
            ->count('customer_id');

        return $newCustomers;
    }

    private function getRepeatCustomer()
    {
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        // Step 1: Count of distinct customer IDs for the current month
        $currentMonthCustomers = Earning::select('customer_id')
            ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
            ->distinct()
            ->pluck('customer_id')
            ->toArray();

        // Step 2: Count of distinct customer IDs for all previous months except the current month
        $previousMonthsCustomers = Earning::select('customer_id')
            ->where('created_at', '<', $currentMonthStart)
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '<', Carbon::now()->month)
            ->distinct()
            ->pluck('customer_id')
            ->toArray();

        // Step 3: Find the intersection of customer IDs between the two queries
        $repeatCustomersCount = count(array_intersect($currentMonthCustomers, $previousMonthsCustomers));

        return $repeatCustomersCount;
    }

    private function getEarningPerMonth()
    {
        $earningCounts = [];
        $currentYear = $this->thisYear;

        for ($month = 1; $month <= 12; $month++) {
            $earningCount = Earning::whereMonth('created_at', $month)
                ->whereYear('created_at', $currentYear)
                ->sum('amount');

            $earningCounts[] = $earningCount;
        }

        return $earningCounts;
    }

    private function getExpensePerMonth()
    {
        $expenseCounts = [];
        $currentYear = $this->thisYear;

        for ($month = 1; $month <= 12; $month++) {
            $expenseCount = Expense::whereMonth('created_at', $month)
                ->whereYear('created_at', $currentYear)
                ->sum('amount');

            $expenseCounts[] = $expenseCount;
        }

        return $expenseCounts;
    }

    private function getProjectStatus()
    {
        $in_progress = Project::where('status','in_progress')->count();
        $completed = Project::where('status','completed')->count();

        return ['inProgressProject' => $in_progress, 'completedProject' => $completed];
    }

    function calculatePercentageIncrease($currentCount, $previousCount): float
    {
        return $previousCount !== 0 ? (($currentCount - $previousCount) / $previousCount) * 100 : 0;
    }

    protected function getTaskUpComming()
    {
        return Task::whereDate('date', '>=', now()->toDateString())
            ->whereDate('date', '<=', now()->addDays(2)->toDateString())
            ->get();
    }
}
