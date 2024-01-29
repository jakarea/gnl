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
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        $projects = Project::orderByDesc('project_id');

        $selectedStatus = '';
        if (!empty($status)) {
            $selectedStatus = $status;
            if ($status == 'in_progress') {
                $projects->where('status', 'in_progress');
            } elseif ($status == 'completed') {
                $projects->where('status', 'completed');
            } else {
                $projects->whereIn('status', ['in_progress', 'completed']);
            }
        }

        $projects = $projects->paginate(16);

        return view("projects/index", compact("projects", 'selectedStatus'));
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

    public function store(Request $request)
    {
        // return $request->all();

        $validatedData = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'tax' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'note' => 'nullable|string',
            'priority' => 'required|in:basic,important,priority',
            'description' => 'nullable|string'
            // 'status' => 'required|in:in_progress,completed',
        ]);

        $project = Project::create($validatedData);



        // Process thumbnail upload if present
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = substr(md5(time()), 0, 10) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = $thumbnail->storeAs('projects', $filename, 'public');
            $project->update(['thumbnail' => $thumbnailPath]);
        }

        // Sync customers with the project
        $project->customers()->sync($validatedData['customer_id']);

        return redirect()->back()->with('success', 'Project created successfully');
    }

    public function search(Request $request, $searchTerm)
    {
        $searchTerms = $searchTerm;
        $customers = Customer::where('name', 'like', '%' . $searchTerms . '%')->get();

        return response()->json(['message' => $customers]);
    }

    public function destroy($project_id)
    {
        $projectInfo = Project::findOrFail($project_id);
        if ($projectInfo->delete()) {
            return redirect()->back()->with('success', 'Project deleted successfully');
        }
    }
}
