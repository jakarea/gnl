<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\LeadType;
use App\Models\ServiceType;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Customer\CustomerRequest;

class CustomerControlller extends ApiController
{

    public function index()
    {

        $query = Customer::query();

        $status = request()->input('status', 'all');
        $serviceTypeId = request()->input('searchTypeId','all');
        $leadTypeId = request()->input('leadTypeId','all');

        $q = request()->input('q','');
        if ($q) {
            $query->where(function ($query) use ($q) {
                $query->where('name', 'LIKE', "%$q%")
                    ->orWhere('designation', 'LIKE', "%$q%")
                    ->orWhere('email', 'LIKE', "%$q%")
                    ->orWhere('phone', 'LIKE', "%$q%");
            });
        }

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($leadTypeId !='all') {
            $query->where('lead_type_id', $leadTypeId);
        }

        if ($serviceTypeId !='all') {
            $query->where('service_type_id', $serviceTypeId);
        }

        $customers = $query->orderByDesc('customer_id')->paginate(20);
        $customers->appends(request()->query());

        $data['customers'] = $customers;


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

        return $request->dd();

        $customer = $addCustomer->addCustomer($request);
        Notification::create([
            'creator_id' => auth()->user()->user_id,
            'action_id' => $customer->customer_id,
            'type' => 'create',
            'action_link' => "customers.show",
            'title' => "Customer added",
            'message' => "Customer added successfully",
            'status' => true,
        ]);

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
        // dd($request->all());
        $customer = Customer::findOrFail($customer_id);
        $data = $request->except(['avatar']);

        $customer->update($data);

        if ($request->hasFile('avatar')) {
            if ($customer->avatar) {
                $avatarPath = str_replace('storage/', '', $customer->avatar);
                Storage::disk('public')->delete($avatarPath);
            }
            $avatar = $request->file('avatar');
            $filename = substr(md5(time()), 0, 10) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('customers', $filename, 'public');
            $customer->update(['avatar' => 'storage/'.$avatarPath]);
        }

        Notification::create([
            'creator_id' => auth()->user()->user_id,
            'action_id' => $customer->customer_id,
            'type' => 'update',
            'action_link' => "customers.show",
            'title' => "Customer updated",
            'message' => "Customr updated successfully",
            'status' => true,
        ]);

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
        $customerInfo->earnings()->delete();

        $customerInfo->projects()->detach();

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
