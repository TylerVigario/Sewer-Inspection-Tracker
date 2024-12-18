<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('projects.index', ['projects' => Project::all()]);
    }

    /**
     * Display the new Project profile form.
     */
    public function create(): View
    {
        return view('projects.edit');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Project::class)],
            'customer_id' => ['required', 'exists:customers,id'],
            'due' => ['required', 'date'],
            //'lat' => ['required', 'between:-90,90'],
            //'lng' => ['required', 'between:-180,180'],
        ]);

        $project = Project::create([
            'name' => $request->name,
            'customer_id' => $request->customer_id,
            'due' => $request->due,
            'lat' => 0,
            'lng' => 0,
        ]);

        return Redirect::route('projects.show', $project);
    }

    /**
     * Display the Project view.
     */
    public function show(Project $project): View
    {
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    /**
     * Display the Project's profile form.
     */
    public function edit(Project $project): View
    {
        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the project's profile information.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Project $project, Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Project::class)->ignore($project->id)],
            'customer_id' => ['required', 'exists:customers,id'],
            'due' => ['required', 'date'],
            //'lat' => ['required', 'between:-90,90'],
            //'lng' => ['required', 'between:-180,180'],
        ]);

        $project->fill([
            'name' => $request->name,
            'customer_id' => $request->customer_id,
            'due' => $request->due,
            //'lat' => $request->lat,
            //'lng' => $request->lng,
        ])->save();

        return Redirect::route('projects.edit', $project)->with('status', 'project-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
