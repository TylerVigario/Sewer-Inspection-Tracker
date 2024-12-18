<x-app-layout>
    <x-slot name="breadcrumbs">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold text-gray-900">Projects</h1>
                                <p class="mt-2 text-sm text-gray-700">Edit and view projects.</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{ route('projects.create') }}" class="ml-auto flex items-center gap-x-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    <svg class="-ml-1.5 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path d="M10.75 6.75a.75.75 0 0 0-1.5 0v2.5h-2.5a.75.75 0 0 0 0 1.5h2.5v2.5a.75.75 0 0 0 1.5 0v-2.5h2.5a.75.75 0 0 0 0-1.5h-2.5v-2.5Z" />
                                    </svg>
                                    New
                                </a>
                            </div>
                        </div>
                        <div class="-mx-4 mt-4 sm:-mx-0">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">Name</th>
                                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white sm:table-cell">Progress</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Due</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 light:bg-white">
                                    @foreach ($projects as $project)
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                            <div class="font-medium text-gray-900 dark:text-white">{{ $project->name }}</div>
                                            <div class="mt-1 text-gray-500 dark:text-gray-300">{{ $project->customer->name }}</div>
                                        </td>
                                        <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300 sm:table-cell">0 / {{ $project->assets()->count() }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $project->due->diffForHumans() }}</td>
                                        <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $project->name }}</span></a>
                                            <a href="{{ route('projects.show', $project) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">View<span class="sr-only">, {{ $project->name }}</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $projects->links('tailwind.centered') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
