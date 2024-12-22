<?php

namespace App\Http\Controllers\Installations;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Installation;
use App\Models\Project;

class ProjectAssetInstallationController extends Controller
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
    public function show(Project $project, Asset $asset, Installation $installation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Asset $asset, Installation $installation)
    {
        //
    }
}
