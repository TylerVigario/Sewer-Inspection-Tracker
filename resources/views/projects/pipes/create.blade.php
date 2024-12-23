<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.show', $project) }}" :value="$project->name" />
        <x-breadcrumb href="{{ route('projects.show', [$project, 'tab' => 'pipes']) }}" :value="'Pipes'" />
        <x-breadcrumb href="{{ route('projects.pipes.create', $project) }}" aria-current="page" :value="'New Pipe'" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('pipes.partials.settings', [
                'url' => route('projects.pipes.store', $project),
                'method' => 'post',
                'project' => $project,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
