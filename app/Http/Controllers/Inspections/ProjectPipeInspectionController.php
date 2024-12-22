<?php

namespace App\Http\Controllers\Inspections;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use App\Models\Pipe;
use App\Models\Project;

class ProjectPipeInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project, Pipe $pipe)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project, Pipe $pipe)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Pipe $pipe, Inspection $inspection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Pipe $pipe, Inspection $inspection)
    {
        //
    }
}
