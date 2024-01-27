<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Customer\CustomerRequest;

class ApiCustomerControlller extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():JsonResponse
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

        return $this->jsonResponse(false, $this->success,$data,$this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerService $addCustomer, CustomerRequest $request)
    {
        try {

            $customer = $addCustomer->addCustomer($request);
            return $this->jsonResponse(false, 'Customer created successfully', $customer, [], JsonResponse::HTTP_CREATED);

        }catch (\Exception $e) {

            return $this->jsonResponse(true, 'Failed to create customer', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
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
       $customer = Customer::findOrFail( $customer_id);
        return $this->jsonResponse(false, $this->success, $customer, $this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(CustomerRequest $request, $customer_id)
    // {

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

        $customerInfo = $customer;
        return $this->jsonResponse(false, $this->success, $customerInfo, $this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id)
    {
        $customerInfo = Customer::findOrFail( $customer_id);
        if( $customerInfo->delete() ){
            return $this->jsonResponse(false, $this->success, $customerInfo, $this->emptyArray, JsonResponse::HTTP_OK);
        }

    }

    function calculatePercentageIncrease($currentCount, $previousCount): float {
        return $previousCount !== 0 ? (($currentCount - $previousCount) / $previousCount) * 100 : 0;
    }

    function searchCustomerQuery( Request $request) {

        $status = $request->input('status', 'all');
        $query = Customer::query();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $customers = $query->get();

        return $this->jsonResponse(false, $this->success, $customers, $this->emptyArray, JsonResponse::HTTP_OK);
    }
}
