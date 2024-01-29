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

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('project_id')->get();

        return view("projects/index", compact("projects"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view("projects/single", compact("project"));
    }

    public function store(CustomerService $addCustomer, ProjectRequest $request)
    {
        if ($request->customer_id) {
            $customerIds = explode(",", $request->customer_id);
        } else if ($request->manualyCustomer == true || $request->manualyCustomer == "true") {
            $customer = $addCustomer->addCustomer($request);
            $customerIds = $customer->customer_id;
        }

        $data = $request->except(['thumbnail']);

        $project = Project::create($data);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = substr(md5(time()), 0, 10) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = $thumbnail->storeAs('projects', $filename, 'public');
            $project->update(['thumbnail' => $thumbnailPath]);
        }

        $project->customers()->sync($customerIds);

        return redirect()->back()->with('success', 'Project created successfully');
    }

    public function destroy($project_id)
    {
        $projectInfo = Project::findOrFail($project_id);
        if ($projectInfo->delete()) {
            return redirect()->back()->with('success', 'Project deleted successfully');
        }
    }
}
