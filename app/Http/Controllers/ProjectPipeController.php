<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Pipe;
use Illuminate\Contracts\View\View;

class ProjectPipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project): View
    {
        return view('projects.pipes.create',[
            'project' => $project,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Pipe $pipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Pipe $pipe)
    {
        return view('projects.pipes.edit', [
            'project' => $project,
            'pipe' => $pipe
        ]);
    }
}
