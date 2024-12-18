<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project = null): View
    {
        return view('assets.index', [
            'project' => $project,
            'assets' => Asset::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project = null): view
    {
        return view('assets.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Project $project = null): RedirectResponse
    {
        $request->validate([
            'asset_type_id' => ['required', 'exists:asset_types,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $asset = Asset::create([
            'asset_type_id' => $request->asset_type_id,
            'name' => $request->name,
        ]);

        return Redirect::route('projects.show', $asset->project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project = null, Asset $asset): View
    {
        return view('assets.show', [
            'project' => $project,
            'asset' => $asset,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project = null, Asset $asset): View
    {
        return view('assets.edit', [
            'project' => $project,
            'asset' => $asset,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Project $project = null, Asset $asset)
    {
        $request->validate([
            'asset_type_id' => ['required', 'exists:asset_types,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $asset->fill([
            'asset_type_id' => $request->asset_type_id,
            'name' => $request->name,
        ])->save();

        return Redirect::route('assets.edit', $asset)->with('status', 'asset-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project = null, Asset $asset)
    {
        //
    }
}
