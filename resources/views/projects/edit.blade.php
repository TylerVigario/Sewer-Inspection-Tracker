<x-app-layout>
    <x-slot name="breadcrumbs">
        @isset($project)
        <x-breadcrumb href="{{ route('projects.edit', [$project]) }}" aria-current="page" :value="$project->name" />
        @else
        <x-breadcrumb href="{{ route('projects.create') }}" aria-current="page" :value="'New'" />
        @endif
    </x-slot>

    <div class="pt-8 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('projects.partials.settings', [
                        'method' => 'post',
                        'url' => route('projects.create'),
                    ])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
