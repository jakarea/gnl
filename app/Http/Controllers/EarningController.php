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

    public function index()
    {
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();
        $earnings = Earning::with('customer')->paginate(12);

        $today = Carbon::today();

        // total earning
        $earningAmount = Earning::pluck('amount')->toArray();
        $totalEarning = array_sum($earningAmount);

        // total tax
        $taxAmount = Earning::pluck('tax')->toArray();
        $totalTax = array_sum($taxAmount);

        // total profit
        $totalProfit = $totalEarning - $totalTax;

        // earning amount today
        $earningAmountToday = Earning::whereDate('created_at', $today)->pluck('amount')->toArray();
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
}
