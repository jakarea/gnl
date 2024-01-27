<?php

namespace App\Http\Controllers;

use App\Traits\SlugTrait;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Servicetype\ServiceTypeRequest;

class ApiServiceTypeController extends ApiController
{
    use SlugTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():JsonResponse
    {
        $services = ServiceType::orderByDesc('service_type_id')->get();
        return $this->jsonResponse(false, $this->success,$services,$this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceTypeRequest $request)
    {
        try {

            $data = $request->all();

            // $slug = $this->makeUniqueSlug($request->input('name'), 'ServiceType', $leadType->lead_type_id);

            $data['slug'] = 'test';
            $service = ServiceType::create($data);

            return $this->jsonResponse(false, 'Service created successfully', $service, [], JsonResponse::HTTP_CREATED);

        }catch (\Exception $e) {

            return $this->jsonResponse(true, 'Failed to create service', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
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
    public function show($service_id)
    {
       $service = ServiceType::findOrFail( $service_id);
        return $this->jsonResponse(false, $this->success, $service, $this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceTypeRequest $request, $service_id)
    {

        $service = ServiceType::findOrFail( $service_id );

        $data = $request->all();

        $data['slug'] = 'test';
        $service->update( $data );

        return $this->jsonResponse(false, $this->success, $service, $this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($service_id)
    {

        $service = ServiceType::findOrFail( $service_id);
        if( $service->delete() ){
            return $this->jsonResponse(false, $this->success, $service, $this->emptyArray, JsonResponse::HTTP_OK);
        }

    }
}
