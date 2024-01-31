<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Customer;
use App\Models\LeadType;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Task\TaskRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;

class TaskController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['lead_types'] = LeadType::orderByDesc('lead_type_id')->get();
        $data['services_types'] = ServiceType::orderByDesc('service_type_id')->get();
        $data['tasks'] = Task::with('customer')->orderByDesc('task_id')->get();

        return view('to-do-list.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerService $addCustomer,TaskRequest $request){

        try {



            $data = $request->except(['file_upload', 'schedule']);

            if($request->manualyCustomer == true || $request->manualyCustomer == "true"){
                $customer =  $addCustomer->addCustomer($request);
                $customerId = $customer->customer_id;
            }elseif($request->customer_id){
                $customerId = $request->customer_id;
            }

            // $times = explode('-', $request->schedule);
            // $data['start_time'] = trim($times[0]);
            // $data['end_time'] = trim($times[1]);

            $data['start_time'] = $request->schedule;
            $data['end_time'] = '18:50';



            $data['created_by'] = auth()->user()->full_name;
            $data['customer_id'] = $customerId;

            // dd( $data);

            $taks = Task::create($data);

            if ($request->hasFile('file_upload')) {
                $avatar = $request->file('file_upload');
                $filename = substr(md5(time()), 0 , 10) .'.' . $avatar->getClientOriginalExtension();
                $avatarPath = $avatar->storeAs('tasks', $filename, 'public');
                $taks->update(['file' => 'storage/' . $avatarPath]);
            }

            return redirect('/to-do-list')->withSuccess('Task Created Successfuly!');

        }catch (\Exception $e) {

            return redirect('/to-do-list')->withErrors('Failed to create task!!');
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
    public function show($task_id)
    {
       $task = Task::findOrFail( $task_id);
        return $this->jsonResponse(false, $this->success, $task, $this->emptyArray, JsonResponse::HTTP_OK);
    }


    public function edit(Request $request)
    {
        if ($request->ajax()) {

            $data['lead_types'] = LeadType::orderByDesc('lead_type_id')->get();
            $data['services_types'] = ServiceType::orderByDesc('service_type_id')->get();

            $data['task'] = Task::findOrFail($request->taskId);
            return view('components.task-edit-modal', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerService $addCustomer, TaskRequest $request, $taks_id)
    {

        $task = Task::findOrFail( $taks_id );

        $data = $request->except(['file_upload', 'schedule']);

        if($request->customer_id){
            $customerId = $request->customer_id;
        }elseif($request->manualyCustomer == true || $request->manualyCustomer == "true"){
            $customer =  $addCustomer->addCustomer($request);
            $customerId = $customer->customer_id;
        }

        $data['customer_id'] = $customerId;

        // $times = explode('-', $request->schedule);
        // $data['start_time'] = trim($times[0]);
        // $data['end_time'] = trim($times[1]);

        $data['start_time'] = $request->schedule;
        $data['end_time'] = '18:50';
        $data['created_by'] = auth()->user()->full_name;


        $task->update( $data );

        if ($request->hasFile('file_upload')) {
            if ($task->file) {
                Storage::disk('public')->delete("tasks/{$task->file}");
            }
            $file = $request->file('file_upload');
            $filename = substr(md5(time()), 0 , 10) .'.' . $file->getClientOriginalExtension();
            $avatarPath = $file->storeAs('tasks', $filename, 'public');
            $task->update(['file' => $avatarPath]);
        }

        return redirect('/to-do-list')->withSuccess('Task Update Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id)
    {
        $taskInfo = Task::findOrFail( $customer_id);
        if( $taskInfo->delete() ){
            return $this->jsonResponse(false, $this->success, $taskInfo, $this->emptyArray, JsonResponse::HTTP_OK);
        }

    }


    public function projectSearch(Request $request){
        if( $request->ajax() ){
            $query = $request->input('query');
            if ($query === null || $query === '') {
                $data['projects'] = Project::all();
            }
            $data['projects'] = Project::where('title', 'like', "%$query%")->get();
            return view('components.load-project', $data);
        }
    }

    public function getProjectById(Request $request){
        if( $request->ajax() ){
            $data['project'] = Project::findOrFail( $request->projectId);
            return view( 'components.load-project-by-id' , $data);
        }
    }

}

