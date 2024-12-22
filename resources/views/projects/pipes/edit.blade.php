<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" aria-current="page" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.show', $project) }}" :value="$project->name" />
        <x-breadcrumb href="{{ route('projects.show', [$project, 'tab' => 'pipes']) }}" aria-current="page" :value="'Pipes'" />
        <x-breadcrumb href="{{ route('projects.pipes.edit', [$project, $pipe]) }}" aria-current="page" :value="$pipe->upstreamAsset->fullName . ' -> ' . $pipe->downstreamAsset->fullName" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('pipes.partials.settings', [
                'url' => route('pipes.update', $pipe),
                'method' => 'patch',
                'project' => $project,
                'pipe' => $pipe,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
