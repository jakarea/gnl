<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LeadType\StoreRequest;
use App\Models\LeadType;
use App\Process\LeadTypeProcess;
use App\Traits\SlugTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiLeadTypeController extends ApiController
{
    use SlugTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():JsonResponse
    {
        $leadTypes = LeadType::orderByDesc('lead_type_id')->get();

        return $this->jsonResponse(false,$this->success,$leadTypes,$this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {

            $leadType = LeadTypeProcess::create($request);

            return $this->jsonResponse(false, 'LeadType created successfully', $leadType, [], JsonResponse::HTTP_CREATED);

        }catch (\Exception $e) {

            return $this->jsonResponse(true, 'Failed to create LeadType', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $lead_type_id
     * @return \Illuminate\Http\Response
     */
    public function show($lead_type_id)
    {
        $leadType = LeadType::find($lead_type_id);

        if (!$leadType) {
            return $this->jsonResponse(true, 'Lead type not found', [], [], JsonResponse::HTTP_NOT_FOUND);
        }

        return $this->jsonResponse(false, $this->success, $leadType, $this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lead_type_id)
    {

        $leadType = LeadType::findOrFail( $lead_type_id );
        $slug = $this->makeUniqueSlug($request->input('name'), 'LeadType', $leadType->lead_type_id);

        $leadType->name = $request->input('name');
        $leadType->slug = $slug;

        $leadType->save();
        return $this->jsonResponse(false, $this->success, $leadType, $this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $lead_type_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lead_type_id)
    {
        $leadType = LeadType::find($lead_type_id);

        if (!$leadType) {
            return $this->jsonResponse(true, 'Lead type not found', [], [], JsonResponse::HTTP_NOT_FOUND);
        }

        try {
            $leadType->delete();
            return $this->jsonResponse(false, $this->success, $leadType, $this->emptyArray, JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return $this->jsonResponse(true, 'Failed to delete lead type', [], [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
