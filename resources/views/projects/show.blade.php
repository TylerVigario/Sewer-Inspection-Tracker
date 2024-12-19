<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.show', [$project]) }}" aria-current="page" :value="$project->name" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mt-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8" x-data="{ tab: 'Asset' }">
                        <div class="relative border-b border-gray-200 pb-5 sm:pb-0">
                            <div class="md:flex md:items-center md:justify-between">
                                <div class="mt-3 flex md:absolute md:right-0 md:top-3 md:mt-0">
                                    <a href="{{ route('projects.assets.create', [$project]) }}">
                                        <button type="button" x-show="tab == 'Asset' || tab == 'Pipe'" x-text="'New ' + tab" class="ml-3 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New Asset</button>
                                    </a>
                                </div>
                            </div>
                            <div class="mt-6">
                                <div class="grid grid-cols-1 sm:hidden">
                                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                    <select aria-label="Select a tab" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                        <option>Map</option>
                                        <option selected>Assets</option>
                                        <option>Pipes</option>
                                        <option>Settings</option>
                                    </select>
                                    <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end fill-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <!-- Tabs at small breakpoint and up -->
                                <div class="hidden sm:block">
                                    <nav class="-mb-px flex space-x-8">
                                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                        <a href="#" x-on:click="tab = 'Map'" class="whitespace-nowrap border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Map</a>
                                        <a href="#" x-on:click="tab = 'Asset'" class="whitespace-nowrap border-b-2 border-indigo-500 px-1 pb-4 text-sm font-medium text-indigo-600" aria-current="page">Assets</a>
                                        <a href="#" x-on:click="tab = 'Pipe'" class="whitespace-nowrap border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Pipes</a>
                                        <a href="#" x-on:click="tab = 'Settings'" class="whitespace-nowrap border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Settings</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div x-show="tab == 'Map'" x-transition class="-mx-4 mt-4 sm:-mx-0">
                            <div id="map" class="map w-full"></div>
                            <script>
                                let markers = {!!json_encode($markers) !!};
                                let paths = {!!json_encode($paths) !!};
                            </script>
                        </div>
                        <div x-show="tab == 'Asset'" x-transition class="-mx-4 mt-4 sm:-mx-0">
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
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-0">{{ $asset->type->tag }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $asset->name }}</td>
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
                        <div x-show="tab == 'Pipe'">

                        </div>
                        <div x-show="tab == 'Settings'">
                            <form method="post" action="{{ route('projects.update', $project) }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')

                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $project->name)" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <x-input-label for="project_type_id" :value="__('Project Type')" />
                                    <div class="mt-2 grid grid-cols-1">
                                        <select id="project_type_id" name="project_type_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                            @foreach(App\Models\ProjectType::all() as $projectType)
                                            <option @if($project->type == $projectType) selected @endif value="{{ $projectType->id }}">{{ $projectType->name }}</option>
                                            @endforeach
                                        </select>
                                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('project_type_id')" />
                                </div>

                                <div>
                                    <x-input-label for="customer_id" :value="__('Customer')" />
                                    <div class="mt-2 grid grid-cols-1">
                                        <select id="customer_id" name="customer_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                            @foreach(App\Models\Customer::all() as $customer)
                                            <option @if($project->customer->id == $customer->id) selected @endif value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('customer_id')" />
                                </div>

                                <div>
                                    <x-input-label for="due" :value="__('Due')" />
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker id="due" name="due" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $project->due->format('m/d/Y') }}" placeholder="Select date">
                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('due')" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                                    @if (session('status') === 'project-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
