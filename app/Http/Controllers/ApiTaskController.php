<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Task\TaskRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\ApiController;

class ApiTaskController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():JsonResponse
    {
        $tasks = Task::orderByDesc('task_id')->get();

        return $this->jsonResponse(false, $this->success,$tasks,$this->emptyArray, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerService $addCustomer,TaskRequest $request)
    {
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
            // $data['created_by'] = auth()->user()->name;


            $data['start_time'] = $request->schedule;
            $data['end_time'] = '18:50';
            $data['created_by'] = "Admin";


            $data['customer_id'] = $customerId;

            $taks = Task::create($data);

            if ($request->hasFile('file_upload')) {
                $avatar = $request->file('file_upload');
                $filename = substr(md5(time()), 0 , 10) .'.' . $avatar->getClientOriginalExtension();
                $avatarPath = $avatar->storeAs('tasks', $filename, 'public');
                $taks->update(['file' => $avatarPath]);
            }


            return $this->jsonResponse(false, 'Task created successfully', $taks, [], JsonResponse::HTTP_CREATED);

        }catch (\Exception $e) {

            return $this->jsonResponse(true, 'Failed to create task', $request->all(), [$e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $taks_id)
    {

        $task = Task::findOrFail( $taks_id );

        $times = explode('-', $request->schedule);

        $data = $request->except(['file_upload', 'schedule']);
        $data['start_time'] = trim($times[0]);
        $data['end_time'] = trim($times[1]);
        $data['created_by'] = auth()->user()->full_name;
        $task->update( $data );

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

        if ($request->hasFile('file_upload')) {
            if ($task->file) {
                Storage::disk('public')->delete("tasks/{$task->file}");
            }
            $file = $request->file('file_upload');
            $filename = substr(md5(time()), 0 , 10) .'.' . $file->getClientOriginalExtension();
            $avatarPath = $file->storeAs('tasks', $filename, 'public');
            $task->update(['file' => $avatarPath]);
        }

        $taskInfo = $task;
        return $this->jsonResponse(false, $this->success, $taskInfo, $this->emptyArray, JsonResponse::HTTP_OK);
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

        $query = $request->input('query');
        if ($query === null || $query === '') {
            return $this->jsonResponse(false, $this->success,[],$this->emptyArray, JsonResponse::HTTP_OK);
        }
        $projects = Project::where('title', 'like', "%$query%")->get();
        return $this->jsonResponse(false, $this->success,$projects,$this->emptyArray, JsonResponse::HTTP_OK);
    }


}

