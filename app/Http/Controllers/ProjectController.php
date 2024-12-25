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
        return view('projects.index', [
            'projects' => Project::paginate(15),
        ]);
    }

    /**
     * Display the new Project profile form.
     */
    public function create(): View
    {
        return view('projects.create');
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
            'lat' => ['required', 'numeric', 'between:-90,90'],
            'lng' => ['required', 'numeric', 'between:-180,180'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
        ]);

        $project = Project::create([
            'name' => $request->name,
            'customer_id' => $request->customer_id,
            'due' => $request->due,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'city' => $request->city,
            'state' => $request->state,
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
            'assets' => $project->assets()->paginate(10, ['*'], 'asset_page')->withQueryString(),
            'pipes' => $project->pipes,
            'inspections' => $project->inspections()->paginate(10, ['*'], 'inspection_page')->withQueryString(),
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
            'lat' => ['required', 'numeric', 'between:-90,90'],
            'lng' => ['required', 'numeric', 'between:-180,180'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
        ]);

        $project->fill([
            'name' => $request->name,
            'customer_id' => $request->customer_id,
            'due' => $request->due,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'city' => $request->city,
            'state' => $request->state,
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
