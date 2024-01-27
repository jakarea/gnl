<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\CustomerService;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Payment\PaymentRequest;

class ApiPaymentController extends ApiController
{
    use SlugTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():JsonResponse
    {
        $payments = Payment::orderByDesc('payment_id')->get();
        return $this->jsonResponse(false, $this->success,$payments,$this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerService $addCustomer, PaymentRequest $request)
    {
        try {

            $data = $request->all();
            if($request->manualyCustomer == true || $request->manualyCustomer == "true"){
                $customer =  $addCustomer->addCustomer($request);
                $$customerId = $customer->customer_id;
            }elseif($request->customer_id){
                $customerId = $request->customer_id;
            }else{
                return $this->jsonResponse(true, 'You have to select a customer', [], [], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }

            $data['customer_id'] = $customerId;

            $service = Payment::create($data);

            return $this->jsonResponse(false, 'Payment created successfully', $service, [], JsonResponse::HTTP_CREATED);

        }catch (\Exception $e) {

            return $this->jsonResponse(true, 'Failed to create payment', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
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
    public function show($payment_id)
    {
       $payment = Payment::findOrFail( $payment_id);
        return $this->jsonResponse(false, $this->success, $payment, $this->emptyArray, JsonResponse::HTTP_OK);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($service_id)
    {

        return;
        $service = Payment::findOrFail( $service_id);
        if( $service->delete() ){
            return $this->jsonResponse(false, $this->success, $service, $this->emptyArray, JsonResponse::HTTP_OK);
        }

    }
}
