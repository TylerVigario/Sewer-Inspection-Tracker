<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" aria-current="page" :value="'Projects'" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100" x-data="{ deleteUrl: '' }">

                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6 lg:px-8">
                        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-base font-semibold">Projects</h3>
                            </div>
                            @if (App\Models\Project::count() > 0)
                            <div class="ml-4 mt-2 shrink-0">
                                <a href="{{ route('projects.create') }}">
                                    <button type="button" class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New project</button>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if (App\Models\Project::count() > 0)
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach($projects as $project)
                        <li class="flex items-center justify-between gap-x-6 py-5 hover:bg-gray-50 px-6 sm:px-8 lg:px-10">
                            <div class="min-w-0">
                                <div class="flex items-start gap-x-3">
                                    <p class="text-sm/6 font-semibold text-gray-900">{{ $project->name }}</p>
                                    <p class="mt-0.5 whitespace-nowrap rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $project->type->name }}</p>
                                </div>
                                <div class="mt-1 flex items-center gap-x-2 text-xs/5 text-gray-500">
                                    <p class="whitespace-nowrap">Due on <time datetime="{{ $project->due }}">{{ $project->due->format("F j, o") }}</time></p>
                                    <svg viewBox="0 0 2 2" class="size-0.5 fill-current">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                    <p class="truncate">Requested by {{ $project->customer->name }}</p>
                                </div>
                            </div>

                            <div class="flex flex-none items-center gap-x-4">
                                <a href="{{ route('projects.show', $project) }}" class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View <span class="sr-only">, {{ $project->name }}</span></a>
                                <div class="relative flex-none" x-data="{ show: false }">
                                    <button @click="show = !show" type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open options</span>
                                        <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                        </svg>
                                    </button>
                                    <div x-cloak x-show="show" x-transition @click.outside="show = ''" class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                                        <a href="{{ route('projects.edit', $project) }}" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-0">Edit<span class="sr-only">, {{ $project->name }}</span></a>
                                        <a href="#" @click.prevent @click="deleteUrl = '{{ route('projects.destroy', $project) }}'" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-1">Delete<span class="sr-only">, {{ $project->name }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{ $projects->links('components.pagination-centered') }}

                    <div x-cloak x-show="deleteUrl != ''" x-transition class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                                            <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                            <h3 class="text-base font-semibold text-gray-900" id="modal-title">Delete project</h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">Are you sure you want to delete the project? All the associated assets will be deleted. This action cannot be undone.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:ml-10 sm:mt-4 sm:flex sm:pl-4">
                                        <form method="post" :action="deleteUrl">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:w-auto">Delete</button>
                                            <button @click="deleteUrl = ''" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:ml-3 sm:mt-0 sm:w-auto">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="text-center p-6">
                        <svg class="mx-auto size-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No projects</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new project.</p>
                        <div class="mt-6">
                            <a href="{{ route('projects.create') }}">
                                <button type="button" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    <svg class="-ml-0.5 mr-1.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                    </svg>
                                    New Project
                                </button>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
