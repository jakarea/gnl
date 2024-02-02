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
use App\Models\LeadType;
use App\Models\ServiceType;

class ProjectsController extends Controller
{
    public function index()
    {
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        $projects = Project::orderByDesc('project_id');

        $selectedStatus = '';
        if (!empty($status)) {
            $selectedStatus = $status;
            if ($status == 'in_progress') {
                $projects->where('status', 'in_progress');
            } elseif ($status == 'completed') {
                $projects->where('status', 'completed');
            }  elseif ($status == 'cancel') {
                $projects->where('status', 'cancel');
            } else {
                $projects->whereIn('status', ['in_progress', 'completed','cancel']);
            }
        }

        $projects = $projects->paginate(16);

        $lead_types = LeadType::orderByDesc('lead_type_id')->get();
        $service_types = ServiceType::orderByDesc('service_type_id')->get();

        return view("projects/index", compact("projects", 'selectedStatus', 'lead_types', 'service_types'));
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
        $lead_types = LeadType::orderByDesc('lead_type_id')->get();
        $service_types = ServiceType::orderByDesc('service_type_id')->get();

        return view("projects/single", compact("project",'lead_types', 'service_types'));
    }

    public function store(CustomerService $addCustomer, ProjectRequest $request)
    {
        // dd($request->all());

        if ($request->customer_id) {
            $customerIds = explode(",", $request->customer_id);
        } else if ($request->manualyCustomer == 1 || $request->manualyCustomer == "1") {
            $customer = $addCustomer->addCustomer($request);
            $customerIds = $customer->customer_id;
        }

        $data = $request->except(['thumbnail']);
        $data['status'] = $request->project_status;

        $project = Project::create($data);

        if ($request->hasFile('thumbnail')) {
            $avatar = $request->file('thumbnail');
            $filename = substr(md5(time()), 0, 10) . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = $avatar->storeAs('projects', $filename, 'public');
            $project->update(['thumbnail' => 'storage/' . $avatarPath]);
        }

        $project->customers()->sync($customerIds);

        return redirect()->back()->with('success', 'Project created successfully');
    }

    public function update(CustomerService $addCustomer, ProjectRequest $request, $project_id)
    {
        $project = Project::findOrFail($project_id);

        if ($request->customer_id) {
            $customerIds = explode(",", $request->customer_id);
        } else if ($request->manualyCustomer == 1 || $request->manualyCustomer == "1") {
            $customer = $addCustomer->addCustomer($request);
            $customerIds = $customer->customer_id;
        }

        $data = $request->except(['thumbnail']);
        $data['status'] = $request->project_status;
        $project->update( $data );

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $file = $request->file('thumbnail');
            $filename = substr(md5(time()), 0 , 10) .'.' . $file->getClientOriginalExtension();
            $thumbnailPath = $file->storeAs('projects', $filename, 'public');
            $project->update(['thumbnail' => 'storage/'.$thumbnailPath]);
        }

        $project->customers()->sync($customerIds);

        return redirect()->back()->with('success', 'Project updated successfully');
    }

    public function search(Request $request)
    {

        $name = $request->name;
        $customers = [];
        if ($name) {
            $customers = Customer::where('name', 'like', '%' . $name . '%')->get();
        }

        return response()->json(['message' => $customers]);
    }

    public function destroy($project_id)
    {
        $project = Project::findOrFail($project_id);

       $filename = basename($project->thumbnail);


        if (Storage::exists('public/projects/' . $filename)) {
            Storage::delete('public/projects/' . $filename);
        }

        $project->customers()->detach();

        // Delete the project record
        if ($project->delete()) {
            return redirect('/projects')->with('success', 'Project deleted successfully');
        } else {
            return redirect('/projects')->with('error', 'Failed to delete project');
        }
    }
}
