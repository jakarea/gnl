<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Customer\CustomerRequest;
use App\Models\LeadType;
use App\Models\ServiceType;

class CustomerControlller extends ApiController
{

    public function index()
    {
        $status = request()->input('status', 'all');
        $serviceTypeId = request()->input('searchTypeId');
        $leadTypeId = request()->input('leadTypeId');
        $query = Customer::query();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($leadTypeId) {
            $query->where('lead_type_id', $leadTypeId);
        }

        if ($serviceTypeId) {
            $query->where('service_type_id', $serviceTypeId);
        }

        $customers = $query->orderByDesc('customer_id')->paginate(12);
        $customers->appends(['leadTypeId' => $leadTypeId, 'searchTypeId' => $serviceTypeId, 'status' => $status]);

        $data['customers'] = $customers;

        // Get count current month
        // $data['totalCustomer'] = $query->count();
        // $data['newCustomer'] = $query->where('created_at', '>=', now()->subDays(7))->count();
        // $data['repeatedCustomer'] = $query->whereColumn('updated_at', '>', 'created_at')->count();

        // // Get counts for the previous month
        // $previousMonthTotalCustomers = $query->whereBetween('created_at', [now()->subMonths(2)->startOfMonth(), now()->subMonth()->endOfMonth()])->count();
        // $previousMonthNewCustomers = $query->whereBetween('created_at', [now()->subMonths(2)->startOfMonth(), now()->subMonth()->endOfMonth()])->count();
        // $previousMonthRepeatedCustomers = $query->whereBetween('updated_at', [now()->subMonths(2)->startOfMonth(), now()->subMonth()->endOfMonth()])->count();

        // $data['totalCustomerInc'] = round($this->calculatePercentageIncrease($data['totalCustomer'], $previousMonthTotalCustomers), 2);
        // $data['newCustomerInc'] = round($this->calculatePercentageIncrease($data['newCustomer'], $previousMonthNewCustomers), 2);
        // $data['repeatCustomerInc'] = round($this->calculatePercentageIncrease($data['repeatedCustomer'], $previousMonthRepeatedCustomers), 2);


        $currentMonthTotalCustomers = $query->count();
        $currentMonthNewCustomers = $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();
        $currentMonthRepeatedCustomers = $query->whereBetween('updated_at', [now()->startOfMonth(), now()->endOfMonth()])->count();

        // Get counts for the previous month

        $previousMonthTotalCustomers = Customer::whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])->count();
        $previousMonthNewCustomers = Customer::whereBetween('created_at', [now()->subMonths(2)->startOfMonth(), now()->subMonth()->endOfMonth()])->count();
        $previousMonthRepeatedCustomers = Customer::whereBetween('updated_at', [now()->subMonths(2)->startOfMonth(), now()->subMonth()->endOfMonth()])->count();

        $data['totalCustomer'] = $currentMonthTotalCustomers;
        $data['newCustomer'] = $currentMonthNewCustomers;
        $data['repeatedCustomer'] = $currentMonthRepeatedCustomers;

        $data['totalCustomerInc'] = round($this->calculatePercentageIncrease($currentMonthTotalCustomers, $previousMonthTotalCustomers), 2);
        $data['newCustomerInc'] = round($this->calculatePercentageIncrease($currentMonthNewCustomers, $previousMonthNewCustomers), 2);
        $data['repeatCustomerInc'] = round($this->calculatePercentageIncrease($currentMonthRepeatedCustomers, $previousMonthRepeatedCustomers), 2);

        $data['lead_types'] = LeadType::orderByDesc('lead_type_id')->get();
        $data['services_types'] = ServiceType::orderByDesc('service_type_id')->get();


        return view('customer.index', $data);
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
        $data['customer'] = Customer::with('earnings')->findOrFail($customer_id);
        return view('customer.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $data['services_types'] = ServiceType::orderByDesc('service_type_id')->get();
            $data['lead_types'] = LeadType::orderByDesc('lead_type_id')->get();
            $data['customer'] = Customer::with('earnings')->findOrFail($request->customerId);
            return view('components.customer-edit-modal', $data);
        }
    }

    public function update(CustomerRequest $request, $customer_id)
    {

        $customer = Customer::findOrFail($customer_id);
        $data = $request->except(['avatar']);

        $customer->update($data);

        if ($request->hasFile('avatar')) {
            if ($customer->avatar) {
                Storage::disk('public')->delete("customers/{$customer->avatar}");
            }
            $avatar = $request->file('avatar');
            $filename = substr(md5(time()), 0, 10) . '.' . $avatar->getClientOriginalExtension();
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
    public function destroy(Request $request, $customer_id)
    {
        $customerInfo = Customer::findOrFail($customer_id);
        if ($customerInfo->delete()) {
            return redirect()->route('customers.index')->withSuccess('Customers deleted successfuly!');
        }
    }

    function calculatePercentageIncrease($currentCount, $previousCount): float
    {
        // return $previousCount !== 0 ? (($currentCount - $previousCount) / $previousCount) * 100 : 0;
        return $previousCount !== 0 ? (($currentCount - $previousCount) / abs($previousCount)) * 100 : 0;

    }

    function showCustomerWithModal(Request $request)
    {
        if ($request->ajax()) {
            $data['customer'] = Customer::findOrFail($request->customerId);
            return view('components.customer-details-modal', $data);
        }
    }
}
