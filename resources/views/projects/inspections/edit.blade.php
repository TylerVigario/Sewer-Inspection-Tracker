<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.show', $project) }}" :value="$project->name" />
        <x-breadcrumb href="{{ route('projects.show', [$project, 'selected' => 'inspections']) }}" :value="'Inspections'" />
        <x-breadcrumb href="{{ route('projects.inspections.edit', [$project, $inspection]) }}" aria-current="page" :value="$inspection->pipe->upstreamAsset->fullName . ' -> ' . $inspection->pipe->downstreamAsset->fullName" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                @include('inspections.partials.settings', [
                'url' => route('projects.inspections.update', [$project, $inspection]),
                'method' => 'patch',
                'project' => $project,
                'inspection' => $inspection,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
