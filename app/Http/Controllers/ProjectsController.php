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
    public function index(){
        $projects = Project::with('customers')->orderByDesc('project_id')->get();
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
        $project = Project::findOrFail( $project_id);
        return view("projects/single", compact("project"));
    }
}
