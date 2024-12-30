<?php

namespace App\Http\Controllers\Pipes;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Pipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectPipeController extends Controller
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
        return view('projects.pipes.create',[
            'project' => $project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Project $project, Pipe $pipe, Request $request): RedirectResponse
    {
        $request->validate([
            'upstream_asset_id' => ['required', 'exists:assets,id'],
            'downstream_asset_id' => ['required', 'exists:assets,id'],
            'size' => ['required', 'integer', 'min:0'],
        ]);

        $pipe = Pipe::create([
            'upstream_asset_id' => $request->upstream_asset_id,
            'downstream_asset_id' => $request->downstream_asset_id,
            'size' => $request->size,
        ]);

        return Redirect::route('projects.show', [$project, 'selected' => 'pipes']);
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
    public function edit(Project $project, Pipe $pipe): View
    {
        return view('projects.pipes.edit', [
            'project' => $project,
            'pipe' => $pipe
        ]);
    }
}
