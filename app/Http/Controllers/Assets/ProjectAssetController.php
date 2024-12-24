<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
     * Store a newly created resource in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Project $project, Request $request): RedirectResponse
    {
        $request->validate([
            'asset_type_id' => ['required', 'exists:asset_types,id'],
            'address_id' => ['exists:addresses,id'],
            'name' => ['required', 'string', 'max:255'],
            'lat' => ['required', ''],
            'lng' => ['required', ''],
            'depth' => [''],
        ]);

        $asset = Asset::create([
            'asset_type_id' => $request->asset_type_id,
            'address_id' => $request->address_id,
            'name' => $request->name,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'depth' => $request->depth,
        ]);

        return Redirect::route('projects.assets.show', [$project, $asset]);
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
