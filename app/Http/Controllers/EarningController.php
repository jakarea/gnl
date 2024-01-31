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
        $this->lastAgoMonth = Carbon::now()->subMonths(1)->startOfMonth();
        $this->thisYear = Carbon::now()->year;
        $this->lastYear = Carbon::now()->subYear()->startOfYear();
        $this->lastAgoYear = Carbon::now()->subYears(2)->startOfYear();
    }

    public function index()
    { 

        // return $this->lastAgoMonth->year;

        $queryStatus = isset($_GET['query']) ? $_GET['query'] : '';

        $lead_types = LeadType::orderByDesc('lead_type_id')->get();
        $earnings = Earning::with('customer')->paginate(12);

        return $totalEarning = $this->getTotalEarning($queryStatus);

        // total tax
        $taxAmount = Earning::pluck('tax')->toArray();
        $totalTax = array_sum($taxAmount);

        // total profit
        $totalProfit = 1234;

        // earning amount today
        $earningAmountToday = Earning::whereDate('created_at', $this->today)->pluck('amount')->toArray();
        $totalEarningToday = array_sum($earningAmountToday);

        // total hosting earning
        $earningAmountHosting = Earning::where('pay_services', 'hoisting')->pluck('amount')->toArray();
        $totalEarningHosting = array_sum($earningAmountHosting);

        // total marketing earning
        $earningAmountMarketing = Earning::where('pay_services', 'marketing')->pluck('amount')->toArray();
        $totalEarningMarketing = array_sum($earningAmountMarketing);

        // total project earning
        $earningAmountProject = Earning::where('pay_services', 'project')->pluck('amount')->toArray();
        $totalEarningProject = array_sum($earningAmountProject);

        // total website earning
        $earningAmountWebsite = Earning::where('pay_services', 'website')->pluck('amount')->toArray();
        $totalEarningWebsite = array_sum($earningAmountWebsite);

        $status = [
            'totalEarning'          => $totalEarning,
            'totalTax'              => $totalTax,
            'totalProfit'           => $totalProfit,
            'totalEarningToday'     => $totalEarningToday, 
            'totalEarningHosting'   => $totalEarningHosting,
            'totalEarningMarketing' => $totalEarningMarketing,
            'totalEarningProject'   => $totalEarningProject,
            'totalEarningWebsite'   => $totalEarningWebsite,
        ]; 
 

        return view('earnings/index',compact('lead_types','earnings','status'));
    }

    public function store(CustomerService $addCustomer, PaymentRequest $request)
    {
       $data = $request->all();
        if($request->manualyCustomer == 1 || $request->manualyCustomer == "1"){
            $customer =  $addCustomer->addCustomer($request);
            $customerId = $customer->customer_id;
        }elseif($request->customer_id){
            $customerId = $request->customer_id;
        }else{
            return redirect()->back()->with('error','You have to select a customer');
        }

        $data['customer_id'] = $customerId;

        $service = Earning::create($data);

        return redirect()->back()->with('success','Payment added successfuly!');
    }

    public function destroy($earning_id)
    {
        if (!$earning_id) {
            return redirect()->back()->with('error','No payment found!');
        }

        $earning = Earning::findOrFail($earning_id);
        if($earning->delete() ){
            return redirect()->back()->with('success','Payment deleted successfuly!');
        }
    }

    private function getTotalEarning($queryStatus)
    { 
         // this month
         $thisMonthEarning = Earning::whereYear('created_at', $this->thisMonth->year)
                            ->whereMonth('created_at', $this->thisMonth->month)
                            ->pluck('amount')
                            ->toArray();

        //  last month
        $lastMonthEarning = Earning::whereYear('created_at', $this->lastMonth->year)
                            ->whereMonth('created_at', $this->lastMonth->month)
                            ->pluck('amount')
                            ->toArray();

        //  last ago 2 month
        $lastAgoMonthEarning = Earning::whereYear('created_at', $this->lastAgoMonth->year)
                            ->whereMonth('created_at', $this->lastAgoMonth->month)
                            ->pluck('amount')
                            ->toArray();

        // this year
        $thisYearEarning = Earning::whereYear('created_at', $this->thisYear)
                            ->pluck('amount')
                            ->toArray();

        // last year
        $lastYearEarning = Earning::whereYear('created_at', $this->lastYear->year)
                            ->pluck('amount')
                            ->toArray();

        // last ago 2year
        $lastAgoYearEarning = Earning::whereYear('created_at', $this->lastAgoYear->year)
                            ->pluck('amount')
                            ->toArray();

         if ($queryStatus === 'last_month') {

           $earningAmount = array_sum($lastMonthEarning);
           $lastAgoMonthEarnings = array_sum($lastAgoMonthEarning);

           if ($lastAgoMonthEarnings != 0) {
            $earningCompare = (($earningAmount - $lastAgoMonthEarnings) / $lastAgoMonthEarnings) * 100;
            } else { 
                $earningCompare = 0;
            }

        }
        elseif ($queryStatus === 'this_year') {
            
            $earningAmount = array_sum($thisYearEarning);
            $lastYearEarnings = array_sum($lastYearEarning);

            if ($lastYearEarnings != 0) {
                $earningCompare = (($earningAmount - $lastYearEarnings) / $lastYearEarnings) * 100;
            } else { 
                $earningCompare = 0;
            }

        }
        elseif ($queryStatus === 'last_year') {

            $earningAmount = array_sum($lastYearEarning);
            $lastAgoYearEarnings = array_sum($lastAgoYearEarning);

            if ($lastAgoYearEarnings != 0) {
                $earningCompare = (($earningAmount - $lastAgoYearEarnings) / $lastAgoYearEarnings) * 100;
            } else { 
                $earningCompare = 0;
            }
            
        }else{
            
            $earningAmount = array_sum($thisMonthEarning);
            $lastAgoMonthEarnings = array_sum($lastAgoMonthEarning);

           if ($lastAgoMonthEarnings != 0) {
            $earningCompare = (($earningAmount - $lastAgoMonthEarnings) / $lastAgoMonthEarnings) * 100;
            } else { 
                $earningCompare = 0;
            }

        }

        // total earning
       return ['earningCompare' => $earningCompare,'earningAmount' => $earningAmount];
    }
}