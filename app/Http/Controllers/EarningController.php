<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\PaymentRequest;
use App\Models\Earning;
use App\Models\LeadType;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EarningController extends Controller
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

        $lead_types = LeadType::orderByDesc('lead_type_id')->get();
        $earnings = Earning::with('customer')->paginate(12);

        // seledted sort query
        $selectedQuery = '';
        if (!empty($queryStatus)) {
            $selectedQuery = $queryStatus;
        }

        // $earningsPerMonth = [];
        $earningsPerMonth =  $this->getEarningPerMonth();

        $data = [
            'totalEarningToday'     => $this->getTodayEarning($queryStatus),
            'totalEarning'          => $this->getTotalEarning($queryStatus),
            'totalTax'              => $this->getTotalTax($queryStatus),
            'totalProfit'           => $this->getTotalProfit($queryStatus),
            'totalEarningHosting'   => $this->getHoistingEarning($queryStatus),
            'totalEarningMarketing' => $this->getMarketingEarning($queryStatus),
            'totalEarningProject'   => $this->getProjectEarning($queryStatus),
            'totalEarningWebsite'   => $this->getWebsiteEarning($queryStatus),
        ];

        return view('earnings/index', compact('lead_types', 'earnings', 'data', 'selectedQuery', 'earningsPerMonth'));
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

        // Fetch amounts and comparison amounts
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
        $type = ['hoisting', 'marketing', 'website', 'project'];
        return $this->getAmounts($queryStatus, 'amount', $type);
    }

    // Get total tax
    private function getTotalTax($queryStatus)
    {
        $type = ['hoisting', 'marketing', 'website', 'project'];
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

    // earning amount today
    private function getTodayEarning()
    {
        $earningAmountToday = Earning::whereDate('created_at', $this->today)->pluck('amount')->toArray();
        return array_sum($earningAmountToday);
    }

    // Get hoisting earning
    private function getHoistingEarning($queryStatus)
    {
        $type = ['hoisting'];
        return $this->getAmounts($queryStatus, 'amount', $type);
    }

    // Get marketing earning
    private function getMarketingEarning($queryStatus)
    {
        $type = ['marketing'];
        return $this->getAmounts($queryStatus, 'amount', $type);
    }

    // Get website earning
    private function getWebsiteEarning($queryStatus)
    {
        $type = ['website'];
        return $this->getAmounts($queryStatus, 'amount', $type);
    }

    // Get project earning
    private function getProjectEarning($queryStatus)
    {
        $type = ['project'];
        return $this->getAmounts($queryStatus, 'amount', $type);
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

    // earning store method
    public function store(CustomerService $addCustomer, PaymentRequest $request)
    {
        $data = $request->all();
        if ($request->manualyCustomer == 1 || $request->manualyCustomer == "1") {
            $customer =  $addCustomer->addCustomer($request);
            $customerId = $customer->customer_id;
        } elseif ($request->customer_id) {
            $customerId = $request->customer_id;
        } else {
            return redirect()->back()->with('error', 'You have to select a customer');
        }

        $data['customer_id'] = $customerId;

        $service = Earning::create($data);

        return redirect()->back()->with('success', 'Payment added successfuly!');
    }

    public function destroy($earning_id)
    {
        if (!$earning_id) {
            return redirect()->back()->with('error', 'No payment found!');
        }

        $earning = Earning::findOrFail($earning_id);
        if ($earning->delete()) {
            return redirect()->back()->with('success', 'Payment deleted successfuly!');
        }
    }

    public function showEarningWithModal($earningId)
    {

        if ($earningId) {
            $earning = Earning::findOrFail($earningId); 
 
            return view('earnings.details',compact('earning'));

        } else{
            return response()->json(['error' => 'No Earning found!'], 404);
        }
    }
}
