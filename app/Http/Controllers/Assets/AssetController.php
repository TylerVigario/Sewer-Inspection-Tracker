<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class AssetController extends Controller
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
    public function create(): view
    {
        return view('assets.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'asset_type_id' => ['required', 'exists:asset_types,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $asset = Asset::create([
            'asset_type_id' => $request->asset_type_id,
            'name' => $request->name,
        ]);

        return Redirect::route('assets.show', $asset);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset): View
    {
        return view('assets.show', [
            'asset' => $asset,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset): View
    {
        return view('assets.edit', [
            'asset' => $asset,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Asset $asset)
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
    public function destroy(Asset $asset)
    {
        //
    }
}
