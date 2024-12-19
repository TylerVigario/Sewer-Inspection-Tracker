<x-app-layout>
    <x-slot name="breadcrumbs">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">

                        <div class="relative border-b border-gray-200 pb-5 sm:pb-0">
                            <div class="md:flex md:items-center md:justify-between">
                                <div class="mt-3 flex md:absolute md:right-0 md:top-3 md:mt-0">
                                    <a href="{{ route('projects.create') }}">
                                        <button type="button" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Project</button>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-6">
                                <div class="grid grid-cols-1 sm:hidden">
                                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                    <select aria-label="Select a tab" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                        <option selected>In Progress</option>
                                        <option>Completed</option>
                                    </select>
                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end fill-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <!-- Tabs at small breakpoint and up -->
                                <div class="hidden sm:block">
                                    <nav class="-mb-px flex space-x-8">
                                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                        <a href="#" class="whitespace-nowrap border-b-2 border-indigo-500 px-1 pb-4 text-sm font-medium text-indigo-600" aria-current="page">In Progress</a>
                                        <a href="#" class="whitespace-nowrap border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Completed</a>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <ul role="list" class="divide-y divide-white/5m">
                            @foreach ($projects as $project)
                            <li class="relative flex items-center space-x-4 py-6">
                                <div class="min-w-0 flex-auto">
                                    <div class="flex items-center gap-x-3">
                                        <div class="flex-none rounded-full bg-green-400/10 p-1 text-green-400">
                                            <div class="size-2 rounded-full bg-current"></div>
                                        </div>
                                        <h2 class="min-w-0 text-sm/6 font-semibold text-gray-700 dark:text-white">
                                            <a href="{{ route('projects.show', [$project]) }}" class="flex gap-x-2">
                                                <span class="truncate">{{ $project->customer->name }}</span>
                                                <span class="text-gray-400">/</span>
                                                <span class="whitespace-nowrap">{{ $project->name }}</span>
                                                <span class="absolute inset-0"></span>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="mt-4 flex items-center gap-x-2.5 text-xs/5 text-gray-400">
                                        <p class="truncate">{{ $project->city }}, {{ $project->state }}</p>
                                        <svg viewBox="0 0 2 2" class="size-0.5 flex-none fill-gray-300">
                                            <circle cx="1" cy="1" r="1" />
                                        </svg>
                                        <p class="whitespace-nowrap">{{ __('Due') }} {{ $project->due->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex-none rounded-full bg-gray-400/10 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-gray-400/20">{{ $project->type->name }}</div>
                                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </li>
                            @endforeach
                        </ul>
                        {{ $projects->links('components.pagination-centered') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
