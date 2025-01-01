<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" aria-current="page" :value="'Projects'" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">

                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6 lg:px-8">
                        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-base font-semibold">Projects</h3>
                            </div>
                            @if (App\Models\Customer::count() && $projects->count() > 0)
                            <div class="ml-4 mt-2 shrink-0">
                                <a href="{{ route('projects.create') }}">
                                    <button type="button" class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New project</button>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if (App\Models\Customer::count() > 0)
                    @if ($projects->count() > 0)
                    <x-modals.confirm-delete>
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
                                            <a href="#" @click.prevent @click="model = ['project', '{{ $project->name }}', '{{ route('projects.destroy', $project) }}']" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-1">Delete<span class="sr-only">, {{ $project->name }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        {{ $projects->links('components.pagination-centered') }}
                    </x-modals.confirm.delete>

                    @else
                    @include('components.no-models', ['type' => 'project', 'url' => route('projects.create')])
                    @endif
                    @else
                    @include('components.no-models', ['type' => 'customer', 'url' => route('customers.create'), 'text' => 'You must create a customer first.'])
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
