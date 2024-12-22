<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" aria-current="page" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.show', $project) }}" :value="$project->name" />
        <x-breadcrumb href="{{ route('projects.show', [$project, 'tab' => 'inspections']) }}" aria-current="page" :value="'Inspections'" />
        <x-breadcrumb href="{{ route('projects.inspections.create', $project) }}" aria-current="page" :value="'Record Inspection'" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('inspections.partials.settings', [
                'url' => route('inspections.store'),
                'method' => 'post',
                ])
            </div>
        </div>
    </div>
</x-app-layout>
