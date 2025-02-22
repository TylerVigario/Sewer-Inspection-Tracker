<?php

namespace App\Http\Controllers\Inspections;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    public function create(Project $project): View
    {
        return view('projects.inspections.create', [
            'project' => $project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Project $project, Request $request)
    {
        $request->validate([
            'pipe_id' => ['required', 'exists:pipes,id'],
            'downstream' => ['required', 'boolean'],
            'complete' => ['required', 'boolean'],
            'remarks' => ['string', 'max:255'],
            'distance' => ['required', 'numeric', 'min:0'],
        ]);

        $inspection = Inspection::create([
            'project_id' => $project->id,
            'pipe_id' => $request->pipe_id,
            'downstream' => $request->downstream,
            'complete' => $request->complete,
            'remarks' => $request->remarks,
            'distance' => $request->distance,
        ]);

        return Redirect::route('projects.show', [$project, 'selected' => 'inspections']);
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
        return view('projects.inspections.edit', [
            'project' => $project,
            'inspection' => $inspection,
        ]);
    }

    /**
     * Update stored resource.
     */
    public function update(Project $project, Inspection $inspection, Request $request)
    {
        $request->validate([
            'pipe_id' => ['required', 'exists:pipes,id'],
            'downstream' => ['required', 'boolean'],
            'complete' => ['required', 'boolean'],
            'remarks' => ['string', 'max:255'],
            'distance' => ['required', 'numeric', 'min:0'],
        ]);

        $inspection->fill([
            'project_id' => $project->id,
            'pipe_id' => $request->pipe_id,
            'downstream' => $request->downstream,
            'complete' => $request->complete,
            'remarks' => $request->remarks,
            'distance' => $request->distance,
        ])->save();

        return Redirect::route('projects.show', [$project, 'selected' => 'inspections']);
    }
}
