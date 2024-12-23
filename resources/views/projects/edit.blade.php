<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.edit', $project) }}" aria-current="page" :value="$project->name" />
    </x-slot>

    <div class="pt-8 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('projects.partials.settings', [
                'url' => route('projects.update', $project),
                'method' => 'patch',
                ])
            </div>
        </div>
    </div>
</x-app-layout>
