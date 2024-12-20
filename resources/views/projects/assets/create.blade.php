<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.show', $project) }}" :value="$project->name" />
        <x-breadcrumb href="{{ route('projects.assets.create', $project) }}" aria-current="page" :value="'Create Asset'" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('assets.partials.settings', [
                    'method' => 'post',
                    'url' => route('assets.store', $project),
                    'project_id' => $project->id
                    ])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
