<?php

namespace App\Http\Controllers;

use Arr;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\CustomerProject;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests\Project\ProjectRequest;
use App\Models\Customer;

class ApiProjectController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():JsonResponse
    {
        $projects = Project::with('customers')->orderByDesc('project_id')->get();

        return $this->jsonResponse(false, $this->success,$projects,$this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerService $addCustomer, ProjectRequest $request)
    {
        try {

            if( $request->customer_id ){
                $customerIds = explode(",",$request->customer_id);
            }else if($request->manualyCustomer == true || $request->manualyCustomer == "true"){
                $customer = $addCustomer->addCustomer($request);
                $customerIds = $customer->customer_id;
            }

            $data = $request->except(['thumbnail']);

            $project = Project::create($data);

            if ($request->hasFile('thumbnail')) {
                $avatar = $request->file('thumbnail');
                $filename = substr(md5(time()), 0 , 10) .'.' . $avatar->getClientOriginalExtension();
                $avatarPath = $avatar->storeAs('projects', $filename, 'public');
                $project->update(['thumbnail' => $avatarPath]);
            }

            $project->customers()->sync($customerIds);

            return $this->jsonResponse(false, 'Project created successfully', $project, [], JsonResponse::HTTP_CREATED);

        }catch (\Exception $e) {

            return $this->jsonResponse(true, 'Failed to create project', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
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
    public function show($project_id)
    {
        $project = Project::findOrFail( $project_id);
        return $this->jsonResponse(false, $this->success, $project, $this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $project_id)
    {
        $project = Project::findOrFail( $project_id );

        $data = $request->except(['thumbnail']);
        $project->update( $data );

        // use it if image is 64 bits
        // $file    = explode(';', $request->image);
        // $file    = explode('/', $file[0]);
        // $file_ex = end($file);
        // $filename = substr(md5(time()), 0, 10) . '.' . $file_ex;

        // or

        // $strpos      = strpos($request->image, ';');
        // $substr      = substr($request->image, 0, $strpos);
        // $file_ext    = explode('/', $substr)[1];
        // $filename    = substr(md5(time()), 0, 10) . "." . $file_ext;

        if ($request->hasFile('thumbnail')) {
            if ($project->file) {
                Storage::disk('public')->delete("projects/{$project->file}");
            }
            $file = $request->file('thumbnail');
            $filename = substr(md5(time()), 0 , 10) .'.' . $file->getClientOriginalExtension();
            $avatarPath = $file->storeAs('projects', $filename, 'public');
            $project->update(['thumbnail' => $avatarPath]);
        }

        $projectInfo = $project;
        return $this->jsonResponse(false, $this->success, $projectInfo, $this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id)
    {
        $projectInfo = Project::findOrFail( $project_id);
        if( $projectInfo->delete() ){
            return $this->jsonResponse(false, $this->success, $projectInfo, $this->emptyArray, JsonResponse::HTTP_OK);
        }

    }

    public function customerSearch(Request $request){

        $query = $request->input('query');
        if ($query === null || $query === '') {
            return $this->jsonResponse(false, $this->success,[],$this->emptyArray, JsonResponse::HTTP_OK);
        }
        $customers = Customer::where('name', 'like', "%$query%")->get();
        return $this->jsonResponse(false, $this->success,$customers,$this->emptyArray, JsonResponse::HTTP_OK);
    }
}
