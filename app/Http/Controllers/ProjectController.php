<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display the new Project profile form.
     */
    public function create(): View
    {
        return view('project.edit');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Customer $customer): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Project::class)],
            'customer_id' => ['required', 'exists:customers']
        ]);

        $project = Project::create([
            'name' => $request->name,
        ]);

        return redirect(route('projects.edit', $project, absolute: false));
    }

    /**
     * Display the Project's profile form.
     */
    public function edit(Project $project): View
    {
        return view('project.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the project's profile information.
     */
    public function update(Project $project, Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Project::class)->ignore($project->id)],
            'customer_id' => ['required', 'exists:customers']
        ]);

        $project->fill([
            'name' => $request->name,
        ]);

        return redirect(route('projects.edit', $project, absolute: false));
    }
}
