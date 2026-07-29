<?php

namespace App\Http\Controllers\Pipes;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Pipe;
use App\Models\Project;

class ProjectAssetPipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project, Asset $asset)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project, Asset $asset)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Asset $asset, Pipe $pipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Asset $asset, Pipe $pipe)
    {
        //
    }
}
