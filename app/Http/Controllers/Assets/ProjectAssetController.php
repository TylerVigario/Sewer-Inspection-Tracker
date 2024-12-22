<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Project;
use Illuminate\View\View;

class ProjectAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project): View
    {
        return view('projects.assets.index', [
            'project' => $project,
            'assets' => Asset::paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project): view
    {
        return view('projects.assets.create', [
            'project' => $project,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Asset $asset): View
    {
        $markers[] = (object)['position' => ['lat' => $asset->lat, 'lng' => $asset->lng], 'title' => $asset->fullName];

        foreach ($asset->downstreamPipes as $pipe) {
            $markers[] = (object)['position' => ['lat' => $pipe->downstreamAsset->lat, 'lng' => $pipe->downstreamAsset->lng], 'title' => $pipe->downstreamAsset->fullName];
            $paths[] = (object)['lat' => $pipe->upstreamAsset->lat, 'lng' => $pipe->upstreamAsset->lng];
            $paths[] = (object)['lat' => $pipe->downstreamAsset->lat, 'lng' => $pipe->downstreamAsset->lng];
        }

        foreach ($asset->upstreamPipes as $pipe) {
            $markers[] = (object)['position' => ['lat' => $pipe->upstreamAsset->lat, 'lng' => $pipe->upstreamAsset->lng], 'title' => $pipe->upstreamAsset->fullName];
            $paths[] = (object)['lat' => $pipe->upstreamAsset->lat, 'lng' => $pipe->upstreamAsset->lng];
            $paths[] = (object)['lat' => $pipe->downstreamAsset->lat, 'lng' => $pipe->downstreamAsset->lng];
        }

        return view('projects.assets.show', [
            'project' => $project,
            'asset' => $asset,
            'markers' => $markers,
            'paths' => $paths,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Asset $asset): View
    {
        return view('projects.assets.edit', [
            'project' => $project,
            'asset' => $asset,
        ]);
    }
}
