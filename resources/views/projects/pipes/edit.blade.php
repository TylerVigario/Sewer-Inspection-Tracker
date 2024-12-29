<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.show', $project) }}" :value="$project->name" />
        <x-breadcrumb href="{{ route('projects.show', [$project, 'selected' => 'pipes']) }}" :value="'Pipes'" />
        <x-breadcrumb href="{{ route('projects.pipes.edit', [$project, $pipe]) }}" class="flex items-center" aria-current="page">
            {{ $pipe->upstreamAsset->fullName }}
            <svg xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 px-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
            </svg>
            {{ $pipe->downstreamAsset->fullName }}
        </x-breadcrumb>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('pipes.partials.settings', [
                'url' => route('projects.pipes.update', [$project, $pipe]),
                'method' => 'patch',
                'project' => $project,
                'pipe' => $pipe,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
