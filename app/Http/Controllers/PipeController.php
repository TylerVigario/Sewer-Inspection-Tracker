<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Pipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PipeController extends Controller
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
        return view('pipes.edit',[
            'project' => $project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project, Pipe $pipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Pipe $pipe)
    {
        //
    }
}
