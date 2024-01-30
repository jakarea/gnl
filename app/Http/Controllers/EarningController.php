<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\PaymentRequest;
use App\Models\Earning;
use App\Models\LeadType;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class EarningController extends Controller
{
    //

    public function index()
    {
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();
        $earnings = Earning::with('customer')->paginate(12);
        return view('earnings/index',compact('lead_types','earnings'));
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
