<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Earning;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
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

        $totalCustomerPerMonth = [];
        $totalCustomerPerMonth =  $this->getCustomerPerMonth();

        $customerStatusInfos = [];
        $customerStatusInfos = $this->getTotalCustomer();

        $projectStatus = [];
        $projectStatus = $this->getProjectStatus($selectedQuery);

        $topActiveCustomers = [];
        $topActiveCustomers = $this->getTopActiveCustomer();

        return view('analytics/index',compact('projectStatus','selectedQuery','customerStatusInfos','totalCustomerPerMonth','topActiveCustomers'));
    }

    // query map for sort
    private function getQueryMap()
    {
        $queryMap = [
            'last_month' => [
                'total' => ['year' => $this->lastMonth->year, 'month' => $this->lastMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ],
            'this_year' => [
                'total' => ['year' => $this->thisYear],
                'compare' => ['year' => $this->lastYear->year]
            ],
            'last_year' => [
                'total' => ['year' => $this->lastYear->year],
                'compare' => ['year' => $this->lastAgoYear->year]
            ],
            'this_month' => [
                'total' => ['year' => $this->thisMonth->year, 'month' => $this->thisMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ],
            'all_time' => [
                'total' => ['year' => 2024, 'month' => 1],
                'compare' => ['year' => 2024, 'month' => 1]
            ],
            '' => [
                'total' => ['year' => $this->thisMonth->year, 'month' => $this->thisMonth->month],
                'compare' => ['year' => $this->lastAgoMonth->year, 'month' => $this->lastAgoMonth->month]
            ]
        ];

        return $queryMap;
    }

    // project status
    private function getProjectStatus($queryStatus)
    {
        // Get the query map
        $queryMap = $this->getQueryMap();
 
        $filterData = isset($queryMap[$queryStatus]) ? $queryMap[$queryStatus] : $queryMap[''];
 
        $year = $filterData['total']['year'];
        $month = isset($filterData['total']['month']) ? $filterData['total']['month'] : null;

        // Construct the project status query based on the filter data
        $query = Project::whereYear('created_at', $year);
        if ($month) {
            $query->whereMonth('created_at', $month);
        }

        // Get the counts for different project statuses
        $in_progress = $query->where('status', 'in_progress')->count();
        $completed = $query->where('status', 'completed')->count();
        $cancel = $query->where('status', 'cancel')->count();

        // Get comparison data
        $compareFilterData = $filterData['compare'];
        $compareYear = $compareFilterData['year'];
        $compareMonth = isset($compareFilterData['month']) ? $compareFilterData['month'] : null;

        // Construct comparison query based on comparison data
        $compareQuery = Project::whereYear('created_at', $compareYear);
        if ($compareMonth) {
            $compareQuery->whereMonth('created_at', $compareMonth);
        }

        // Get the counts for different project statuses for comparison
        $compareInProgress = $compareQuery->where('status', 'in_progress')->count();
        $compareCompleted = $compareQuery->where('status', 'completed')->count();
        $compareCancel = $compareQuery->where('status', 'cancel')->count();

        // Calculate comparison percentage change for each project status
        $inProgressComparePercentage = ($compareInProgress != 0) ? (($in_progress - $compareInProgress) / $compareInProgress) * 100 : 0;
        $completedComparePercentage = ($compareCompleted != 0) ? (($completed - $compareCompleted) / $compareCompleted) * 100 : 0;
        $cancelComparePercentage = ($compareCancel != 0) ? (($cancel - $compareCancel) / $compareCancel) * 100 : 0;

        // Return an array containing comparison percentage change and total project counts
        return [
            'inProgressComparePercentage' => $inProgressComparePercentage,
            'completedComparePercentage' => $completedComparePercentage,
            'canceledComparePercentage' => $cancelComparePercentage,
            'totalInProgress' => $in_progress,
            'totalCompleted' => $completed,
            'totalCanceled' => $cancel
        ];
    }

    // get total unique customer from earning table
    private function getTotalCustomer()
    {
 
        $activeCustomers = Customer::where('status','active')->count();
        $inActiveCustomers = Customer::where('status','inactive')->count();
        $totalCustomers = $activeCustomers + $inActiveCustomers;

        return [
            'totalCustomers' => $totalCustomers,
            'inActiveCustomers' => $inActiveCustomers,
            'activeCustomers' => $activeCustomers,
        ];

    }

    private function getCustomerPerMonth()
    {
        $customerCounts = [];
        $currentYear = $this->thisYear;

        for ($month = 1; $month <= 12; $month++) {
            $customerCount = Customer::whereMonth('created_at', $month)
                ->whereYear('created_at', $currentYear)
                ->count();

            $customerCounts[] = $customerCount;
        }

        return $customerCounts;
    }

    private function getTopActiveCustomer()
    {
        $topActiveCustomers = [];

        $topActiveCustomers = Earning::with('customer')
        ->select('earnings.customer_id', DB::raw('COUNT(*) as count'))
        ->join('customers', 'earnings.customer_id', '=', 'customers.customer_id')
        ->where('customers.status', 'active')
        ->groupBy('earnings.customer_id') 
        ->orderByDesc('count')
        ->get();

        return $topActiveCustomers;
    }
    
}
