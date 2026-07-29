<?php

namespace App\Http\Controllers\Inspections;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use App\Models\Pipe;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
     * Store a newly created resource in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Project $project, Pipe $pipe, Request $request): RedirectResponse
    {
        $request->validate([
            'downstream' => ['required', 'boolean'],
            'complete' => ['required', 'boolean'],
            'remarks' => ['string', 'max:255'],
            'distance' => ['required', 'integer', 'min:0'],
        ]);

        $inspection = Inspection::create([
            'project_id' => $project->id,
            'pipe_id' => $pipe->id,
            'downstream' => $request->downstream,
            'complete' => $request->complete,
            'remarks' => $request->remarks,
            'distance' => $request->distance,
        ]);

        return Redirect::route('projects.pipes.inspections.show', [$project, $pipe, $inspection]);
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
