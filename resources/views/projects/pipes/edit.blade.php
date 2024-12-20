<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.show', $project) }}" :value="$project->name" />
        <x-breadcrumb href="{{ route('projects.pipes.edit', [$project, $pipe]) }}" aria-current="page" :value="$pipe->upstreamAsset->fullName . ' -> ' . $pipe->downstreamAsset->fullName" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                   @include('pipes.partials.settings', [
                        'method' => 'patch',
                        'url' => route('pipes.update', $pipe),
                        'project' => $project,
                        'pipe' => $pipe,
                    ])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
