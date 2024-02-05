<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Lead\LeadStoreRequest;
use App\Process\LeadProcess;
use App\Http\Controllers\API\ApiController;
use App\Models\Lead;
use App\Models\LeadType;


class ApiLeadController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $leads = Lead::with("LeadType")->orderByDesc('lead_id')->paginate(20);

            return $this->jsonResponse(false, $this->success, $leads, $this->emptyArray, JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return $this->jsonResponse(true, 'Failed to fetch leads', [], [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $lead_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($lead_id)
    {
        try {
            $lead = Lead::findOrFail($lead_id);

            return $this->jsonResponse(false, $this->success, $lead, $this->emptyArray, JsonResponse::HTTP_OK);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->jsonResponse(true, 'Lead not found', [], [], JsonResponse::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return $this->jsonResponse(true, 'Failed to fetch lead', [], [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  LeadStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeadStoreRequest $request)
    {
        try {

            // return $request->all();

            $data = $request->all();

            // Check if the specified lead_type_id exists
            if (!LeadType::where('lead_type_id', $data['lead_type_id'])->exists()) {
                return $this->jsonResponse(true, 'Invalid lead_type_id. Lead type not found.', $request->all(), [], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Handle lead creation logic using $data
            $lead = LeadProcess::create($request);

            return $this->jsonResponse(false, 'Lead created successfully', $lead, [], JsonResponse::HTTP_CREATED);
        } catch (\Exception $e) {
            return $this->jsonResponse(true, 'Failed to create lead', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LeadUpdateRequest  $request
     * @param  int  $lead_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(LeadStoreRequest $request, $lead_id)
    {
        try {
            $lead = Lead::findOrFail($lead_id);

            // Check if the specified lead_type_id exists
            if ($request->has('lead_type_id') && !LeadType::where('lead_type_id', $request->input('lead_type_id'))->exists()) {
                return $this->jsonResponse(true, 'Invalid lead_type_id. Lead type not found.', $request->all(), [], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }

            $lead->update($request->validated());

            return $this->jsonResponse(false, 'Lead updated successfully', $lead, $this->emptyArray, JsonResponse::HTTP_OK);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->jsonResponse(true, 'Lead not found', [], [], JsonResponse::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return $this->jsonResponse(true, 'Failed to update lead', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $lead_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($lead_id)
    {
        try {
            $lead = Lead::findOrFail($lead_id);

            // Delete associated files (if any)
            if ($lead->avatar) {
                Storage::disk('public')->delete($lead->avatar);
            }

            // Delete the lead
            $lead->delete();

            return $this->jsonResponse(false, $this->success, [], $this->emptyArray, JsonResponse::HTTP_OK);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->jsonResponse(true, 'Lead not found', [], [], JsonResponse::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return $this->jsonResponse(true, 'Failed to delete lead', [], [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
