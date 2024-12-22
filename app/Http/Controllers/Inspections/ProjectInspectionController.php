<?php

namespace App\Http\Controllers\Inspections;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use App\Models\Project;

class ProjectInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('projects.inspections.create', [
            'project' => $project,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Inspection $inspection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Inspection $inspection)
    {
        //
    }
}
