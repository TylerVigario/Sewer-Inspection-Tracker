<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.show', $project) }}" aria-current="page" :value="$project->name" />
    </x-slot>

    <div class="pt-8 pb-12">
        <div class="max-w-7xl mt-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8 pb-6" x-data="{ selected: 'map' }" x-query-string="selected">

                        <div class="relative border-b border-gray-200 pb-5 sm:pb-0">
                            <div class="md:flex md:items-center md:justify-between">
                                <div class="mt-3 flex md:absolute md:right-0 md:top-3 md:mt-0">
                                    <a x-cloak x-show="selected == 'assets'" href="{{ route('projects.assets.create', $project) }}">
                                        <button type="button" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Asset</button>
                                    </a>
                                    <a x-cloak x-show="selected == 'pipes'" href="{{ route('projects.pipes.create', $project) }}">
                                        <button type="button" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Pipe</button>
                                    </a>
                                    <a x-cloak x-show="selected == 'inspections'" href="{{ route('projects.inspections.create', $project) }}">
                                        <button type="button" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Record Inspection</button>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-6">
                                <div class="grid grid-cols-1 sm:hidden">
                                    <select aria-label="Select a tab" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                        <option :selected="selected == 'map'" @click="selected = 'map'">Map</option>
                                        <option :selected="selected == 'assets'" @click="selected = 'assets'">Assets</option>
                                        <option :selected="selected == 'pipes'" @click="selected = 'pipes'">Pipes</option>
                                        <option :selected="selected == 'inspections'" @click="selected = 'inspections'">Inspections</option>
                                    </select>
                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end fill-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="hidden sm:block">
                                    <nav class="-mb-px flex space-x-8">
                                        <a href="#" @click.prevent @click="selected = 'map'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium" :class="selected == 'map' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'" :aria-current="selected == 'map' ? 'page' : ''">
                                            Map
                                        </a>
                                        <a href="#" @click.prevent @click="selected = 'assets'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium" :class="selected == 'assets' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'" :aria-current="selected == 'assets' ? 'page' : ''">
                                            Assets
                                            <span class="ml-3 hidden rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-900 md:inline-block">{{ $project->assets()->count() }}</span>
                                        </a>
                                        <a href="#" @click.prevent @click="selected = 'pipes'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium" :class="selected == 'pipes' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'" :aria-current="selected == 'pipes' ? 'page' : ''">
                                            Pipes
                                            <span class="ml-3 hidden rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-900 md:inline-block">{{ $project->pipes()->count() }}</span>
                                        </a>
                                        <a href="#" @click.prevent @click="selected = 'inspections'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium" :class="selected == 'inspections' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'" :aria-current="selected == 'inspections' ? 'page' : ''">
                                            Inspections
                                            <span class="ml-3 hidden rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-900 md:inline-block">{{ $project->inspections()->count() }}</span>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div x-cloak x-show="selected == 'map'" x-transition>
                            <div class="map" data-zoom="17" data-center="{{ $project->assets()->count() > 0 ? $project->assets()->first()->lat . ',' .  $project->assets()->first()->lng : $project->lat . ',' . $project->lng }}" data-create-asset="{{ route('projects.assets.create', $project) }}" data-create-pipe="{{ route('projects.pipes.create', $project) }}" data-create-inspection="{{ route('projects.inspections.create', $project) }}">
                                <div class="viewport"></div>
                                @foreach ($project->assets as $asset)
                                <div class="marker" data-position="{{ $asset->lat . ',' . $asset->lng }}" data-id="{{ $asset->id }}" data-title="{{ $asset->fullName }}" data-clickable data-complete="{{ $asset->complete == 1 ? 'true' : 'false' }}" data-url="{{ route('projects.assets.show', [$project, $asset])  }}"></div>
                                @endforeach
                                @foreach ($project->pipes as $pipe)
                                <div class="path" data-start="{{ $pipe->upstreamAsset->lat . ',' . $pipe->upstreamAsset->lng }}" data-end="{{ $pipe->downstreamAsset->lat . ',' . $pipe->downstreamAsset->lng }}" data-complete="{{ $pipe->complete ? 'true' : 'false' }}"></div>
                                @endforeach
                            </div>
                        </div>

                        <x-modals.confirm-delete>
                            <div x-cloak x-show="selected == 'assets'" x-transition>
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">Type</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Name</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Status</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 light:bg-white">
                                        @foreach ($assets as $asset)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-0">{{ $asset->type->name }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $asset->fullName }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $asset->status }}</td>
                                            <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                <div class="flex flex-row-reverse items-center gap-x-4">
                                                    <a href="{{ route('projects.assets.show', [$project, $asset]) }}" class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View <span class="sr-only">, {{ $asset->fullName }}</span></a>
                                                    <div class="relative flex-none" x-data="{ show: false }">
                                                        <button @click="show = !show" type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                            <span class="sr-only">Open options</span>
                                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                                <path d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                                            </svg>
                                                        </button>
                                                        <div x-cloak x-show="show" x-transition @click.outside="show = ''" class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                                                            <a href="{{ route('projects.assets.edit', [$project, $asset]) }}" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-0">Edit<span class="sr-only">, {{ $asset->fullName }}</span></a>
                                                            <a href="#" @click.prevent @click="model = ['asset', '{{ $asset->fullName }}', '{{ route('projects.assets.destroy', [$project, $asset]) }}']" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-1">Delete<span class="sr-only">, {{ $asset->fullName }}</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $assets->links('components.pagination-centered') }}
                            </div>

                            <div x-cloak x-show="selected == 'pipes'" x-transition>
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">Upstream</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Downstream</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Status</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 light:bg-white">
                                        @foreach ($pipes as $pipe)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-0">{{ $pipe->upstreamAsset->fullName }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $pipe->downstreamAsset->fullName }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $pipe->status }}</td>
                                            <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                <div class="flex flex-row-reverse items-center gap-x-4">
                                                    <a href="{{ route('projects.pipes.show', [$project, $pipe]) }}" class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View <span class="sr-only">, {{ $asset->fullName }}</span></a>
                                                    <div class="relative flex-none" x-data="{ show: false }">
                                                        <button @click="show = !show" type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                            <span class="sr-only">Open options</span>
                                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                                <path d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                                            </svg>
                                                        </button>
                                                        <div x-cloak x-show="show" x-transition @click.outside="show = ''" class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                                                            <a href="{{ route('projects.pipes.edit', [$project, $pipe]) }}" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-0">Edit<span class="sr-only">, {{ $pipe->name }}</span></a>
                                                            <a href="#" @click.prevent @click="model = ['pipe', '{{ $pipe->name }}', '{{ route('projects.pipes.destroy', [$project, $pipe]) }}']" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-1">Delete<span class="sr-only">, {{ $pipe->name }}</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $pipes->links('components.pagination-centered') }}
                            </div>

                            <div x-cloak x-show="selected == 'inspections'" x-transition>
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">Type</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Distance</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Inspected at</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Status</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 light:bg-white">
                                        @foreach ($inspections as $inspection)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-0">{{ $inspection->pipe->upstreamAsset->fullName }} -> {{ $inspection->pipe->downstreamAsset->fullName }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $inspection->distance }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $inspection->inspected_at->tz(auth()->user()->timezone)->toDayDateTimeString() }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $inspection->complete ? __('Complete') : __('Not complete') }}</td>
                                            <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <div class="flex flex-row-reverse items-center gap-x-4">
                                                    <a href="{{ route('projects.inspections.show', [$project, $inspection]) }}" class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">View <span class="sr-only">, {{ $asset->fullName }}</span></a>
                                                    <div class="relative flex-none" x-data="{ show: false }">
                                                        <button @click="show = !show" type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900" id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                            <span class="sr-only">Open options</span>
                                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                                <path d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                                            </svg>
                                                        </button>
                                                        <div x-cloak x-show="show" x-transition @click.outside="show = ''" class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-0-button" tabindex="-1">
                                                            <a href="{{ route('projects.inspections.edit', [$project, $pipe]) }}" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-0">Edit<span class="sr-only">, {{ $inspection->created_at }}</span></a>
                                                            <a href="#" @click.prevent @click="model = ['inspection', '{{ $inspection->created_at }}', '{{ route('projects.inspections.destroy', [$project, $inspection]) }}']" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-0-item-1">Delete<span class="sr-only">, {{ $inspection->created_at }}</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $inspections->links('components.pagination-centered') }}
                            </div>

                            </x-confirm-delete>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
