<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Customer\CustomerRequest;

class CustomerControlller extends ApiController
{

    public function index()
    {
        // Get count current month
        $data['customers'] = Customer::orderByDesc('customer_id')->paginate(1);

        $data['totalCustomer'] = Customer::count();
        $data['newCustomer'] = Customer::where('created_at', '>=', now()->subDays(7))->count();
        $data['repeatedCustomer'] = Customer::whereColumn('updated_at', '>', 'created_at')->count();

        // Get counts for the previous month
        $previousMonthTotalCustomers = Customer::whereBetween('created_at', [now()->subMonths(2)->startOfMonth(), now()->subMonth()->endOfMonth()])->count();
        $previousMonthNewCustomers = Customer::whereBetween('created_at', [now()->subMonths(2)->startOfMonth(), now()->subMonth()->endOfMonth()])->count();
        $previousMonthRepeatedCustomers = Customer::whereBetween('updated_at', [now()->subMonths(2)->startOfMonth(), now()->subMonth()->endOfMonth()])->count();

        $data['totalCustomerInc'] = round($this->calculatePercentageIncrease($data['totalCustomer'], $previousMonthTotalCustomers), 2);
        $data['newCustomerInc'] = round($this->calculatePercentageIncrease($data['newCustomer'], $previousMonthNewCustomers), 2);
        $data['repeatCustomerInc'] =round($this->calculatePercentageIncrease($data['repeatedCustomer'], $previousMonthRepeatedCustomers), 2);

        return view('customer.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerService $addCustomer, CustomerRequest $request)
    {
        $customer = $addCustomer->addCustomer($request);
        return redirect()->route('customers.index')->withSuccess('Customers Created Successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id)
    {
       $data['customer'] = Customer::findOrFail( $customer_id);
       return view('customer.show',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit( Request $request ){
        if( $request->ajax() ){
            $data['customer'] = Customer::findOrFail( $request->customerId );
            return view('components.customer-edit-modal',$data);
        }
    }

    public function update(CustomerRequest $request, $customer_id) {

        $customer = Customer::findOrFail( $customer_id );
        $data = $request->except(['avatar']);

        $customer->update( $data );

        if ($request->hasFile('avatar')) {
            if ($customer->avatar) {
                Storage::disk('public')->delete("customers/{$customer->avatar}");
            }
            $avatar = $request->file('avatar');
            $filename = substr(md5(time()), 0 , 10) .'.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('customers', $filename, 'public');
            $customer->update(['avatar' => $avatarPath]);
        }

        return redirect()->route('customers.index')->withSuccess('Customers update successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id)
    {
        return $customer_id;
        $customerInfo = Customer::findOrFail( $customer_id);
        if( $customerInfo->delete() ){
            return redirect()->route('customers.index')->withSuccess('Customers deleted successfuly!');
        }

    }

    function calculatePercentageIncrease($currentCount, $previousCount): float {
        return $previousCount !== 0 ? (($currentCount - $previousCount) / $previousCount) * 100 : 0;
    }

    function showCustomerWithModal( Request $request) {
        if( $request->ajax() ){
            $data['customer'] = Customer::findOrFail( $request->customerId );
            return view('components.customer-details-modal',$data);
        }
    }
}
