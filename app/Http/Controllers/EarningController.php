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

        return $data = [
            'totalEarningToday'     => $this->getTodayEarning($queryStatus),
            'totalEarning'          => $this->getTotalEarning($queryStatus),
            'totalTax'              => $this->getTotalTax($queryStatus),
            'totalProfit'           => $this->getTotalProfit($queryStatus),
            'totalEarningHosting'   => $this->getHoistingEarning($queryStatus),
            'totalEarningMarketing' => $this->getMarketingEarning($queryStatus),
            'totalEarningProject'   => $this->getProjectEarning($queryStatus),
            'totalEarningWebsite'   => $this->getWebsiteEarning($queryStatus),
        ];

        return view('earnings/index', compact('lead_types', 'earnings', 'data'));
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
            '' => [
                'earning' => ['year' => null, 'month' => null],
                'compare' => ['year' => null, 'month' => null]
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

        $compare = ($compareAmount != 0) ? (($amount - $compareAmount) / $compareAmount) * 100 : 0;

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

        $totalProfit = $amountEarning - $taxEarning;

        // $profitCompare = ($earning['amountCompare'] != 0) ? (($totalProfit - $earning['amountCompare']) / $earning['amountCompare']) * 100 : 0;

        return ['totalProfit' => $totalProfit];
    }

    // earning amount today
    private function getTodayEarning()
    {
        $earningAmountToday = Earning::whereDate('created_at', $this->today)->pluck('amount')->toArray();
        $totalEarningToday = array_sum($earningAmountToday);
    }

    // Get hoisting earning
    private function getHoistingEarning($queryStatus)
    {
        $type = ['hoisting'];
        return $this->getAmounts($queryStatus, 'amount', $type);
    }

    // Get hoisting earning
    private function getMarketingEarning($queryStatus)
    {
        $type = ['marketing'];
        return $this->getAmounts($queryStatus, 'amount', $type);
    }

    // Get hoisting earning
    private function getWebsiteEarning($queryStatus)
    {
        $type = ['website'];
        return $this->getAmounts($queryStatus, 'amount', $type);
    }

    // Get hoisting earning
    private function getProjectEarning($queryStatus)
    {
        $type = ['project'];
        return $this->getAmounts($queryStatus, 'amount', $type);
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
}
