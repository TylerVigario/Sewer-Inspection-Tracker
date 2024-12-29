<?php

namespace App\Http\Controllers\Inspections;

use App\Http\Controllers\Controller;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InspectionController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => ['required', 'exists:projects,id'],
            'pipe_id' => ['required', 'exists:pipes,id'],
            'downstream' => ['required', 'boolean'],
            'complete' => ['required', 'boolean'],
            'remarks' => ['string', 'max:255'],
            'distance' => ['required', 'integer', 'min:0'],
        ]);

        $inspection = Inspection::create([
            'project_id' => $request->project_id,
            'pipe_id' => $request->pipe_id,
            'downstream' => $request->downstream,
            'complete' => $request->complete,
            'remarks' => $request->remarks,
            'distance' => $request->distance,
        ]);

        return Redirect::route('inspections.show', $inspection);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inspection $inspection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inspection $inspection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inspection $inspection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inspection $inspection)
    {
        //
    }
}
