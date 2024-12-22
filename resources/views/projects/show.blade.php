<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" aria-current="page" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.show', $project) }}" aria-current="page" :value="$project->name" />
    </x-slot>

    <div class="pt-8 pb-12">
        <div class="max-w-7xl mt-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8" x-data="{tab: 'assets'}" x-query-string.tab="tab">

                        <div class="relative border-b border-gray-200 pb-5 sm:pb-0">
                            <div class="md:flex md:items-center md:justify-between">
                                <div class="mt-3 flex md:absolute md:right-0 md:top-3 md:mt-0">
                                    <a x-show="tab == 'assets'" href="{{ route('projects.assets.create', $project) }}">
                                        <button type="button" x-show="tab == 'assets'" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Asset</button>
                                    </a>
                                    <a x-show="tab == 'pipes'" href="{{ route('projects.pipes.create', $project) }}">
                                        <button type="button" x-show="tab == 'pipes'" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Pipe</button>
                                    </a>
                                    <a x-show="tab == 'inspections'" href="{{ route('projects.inspections.create', $project) }}">
                                        <button type="button" x-show="tab == 'inspections'" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Record Inspection</button>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-6">
                                <div class="grid grid-cols-1 sm:hidden">
                                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                    <select aria-label="Select a tab" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                        <option :selected="tab == 'map'" @click="tab = 'map'">Map</option>
                                        <option :selected="tab == 'assets'" @click="tab = 'assets'">Assets</option>
                                        <option :selected="tab == 'pipes'" @click="tab = 'pipes'">Pipes</option>
                                        <option :selected="tab == 'inspections'" @click="tab = 'inspections'">Inspections</option>
                                        <option :selected="tab == 'settings'" @click="tab = 'settings'">Settings</option>
                                    </select>
                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end fill-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <!-- Tabs at small breakpoint and up -->
                                <div class="hidden sm:block">
                                    <nav class="-mb-px flex space-x-8">
                                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                        <a href="#" @click="tab = 'map'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium hover:border-gray-300 hover:text-gray-700" :class="tab == 'map' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" :aria-current="tab == 'map'">Map</a>
                                        <a href="#" @click="tab = 'assets'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium hover:border-gray-300 hover:text-gray-700" :class="tab == 'assets' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" :aria-current="tab == 'assets'">Assets</a>
                                        <a href="#" @click="tab = 'pipes'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium hover:border-gray-300 hover:text-gray-700" :class="tab == 'pipes' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" :aria-current="tab == 'pipes'">Pipes</a>
                                        <a href="#" @click="tab = 'inspections'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium hover:border-gray-300 hover:text-gray-700" :class="tab == 'inspections' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" :aria-current="tab == 'inspections'">Inspections</a>
                                        <a href="#" @click="tab = 'settings'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium hover:border-gray-300 hover:text-gray-700" :class="tab == 'settings' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" :aria-current="tab == 'settings'">Settings</a>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div x-cloak x-show="tab == 'map'" x-transition>
                            <div id="map" style="height:600px" class="map w-full"></div>
                            <script>
                                let markers = {!! json_encode($markers) !!};
                                let paths = {!! json_encode($paths) !!};
                            </script>
                        </div>

                        <div x-cloak x-show="tab == 'assets'" x-transition>
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
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ __('Never attempted') }}</td>
                                        <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('projects.assets.edit', [$project, $asset]) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">Edit<span class="sr-only">, {{ $asset->name }}</span></a>
                                            <a href="{{ route('projects.assets.show', [$project, $asset]) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">View<span class="sr-only">, {{ $asset->name }}</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $assets->links('components.pagination-centered') }}
                        </div>

                        <div x-cloak x-show="tab == 'pipes'" x-transition>
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
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ __('Never attempted') }}</td>
                                        <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('projects.pipes.edit', [$project, $pipe]) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">Edit<span class="sr-only">, {{ $asset->name }}</span></a>
                                            <a href="{{ route('projects.pipes.show', [$project, $pipe]) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">View<span class="sr-only">, {{ $asset->name }}</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $pipes->links('components.pagination-centered') }}
                        </div>

                        <div x-cloak x-show="tab == 'inspections'" x-transition>
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
                                    @foreach ($inspections as $inspection)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-0">{{ $asset->type->name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $asset->fullName }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ __('Never attempted') }}</td>
                                        <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ route('projects.assets.edit', [$project, $asset]) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">Edit<span class="sr-only">, {{ $asset->name }}</span></a>
                                            <a href="{{ route('projects.assets.show', [$project, $asset]) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">View<span class="sr-only">, {{ $asset->name }}</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $inspections->links('components.pagination-centered') }}
                        </div>

                        <div x-cloak x-show="tab == 'settings'" x-transition>
                            @include('projects.partials.settings', [
                            'url' => route('projects.update', $project),
                            'project'
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
