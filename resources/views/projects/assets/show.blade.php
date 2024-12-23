<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.show', $project) }}" :value="$project->name" />
        <x-breadcrumb href="{{ route('projects.show', [$project, 'tab' => 'assets']) }}" :value="'Assets'" />
        <x-breadcrumb href="{{ route('projects.assets.show', [$project, $asset]) }}" aria-current="page" :value="$asset->fullName" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 max-h-96 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative h-0 overflow-hidden" style="padding-bottom: 56.25%;">
                    <div id="map" class="map"></div>
                    <script>
                    let markers = {!! json_encode($markers) !!};
                    let paths = {!! json_encode($paths) !!};
                    </script>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mt-8 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold text-gray-900">Connected Assets</h1>
                                <p class="mt-2 text-sm text-gray-700">A list of assets connected with pipes to this one.</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{ isset($project) ? route('projects.assets.create', $project) : route('assets.create', ) }}" class="ml-auto flex items-center gap-x-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-0">Asset</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Status</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 light:bg-white">
                                    <tr class="border-t border-gray-200">
                                        <th colspan="5" scope="colgroup" class="bg-gray-50 py-2 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Upstream</th>
                                    </tr>
                                    @foreach ($asset->upstreamPipes as $pipe)
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm text-gray-900 dark:text-white sm:pl-0">{{ $pipe->upstreamAsset->fullName }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300"></td>
                                        <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ isset($project) ? route('projects.assets.edit', [$project, $pipe->upstreamAsset]) : route('assets.edit', $pipe->upstreamAsset) }}" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $asset->name }}</span></a>
                                            <a href="{{ isset($project) ? route('projects.assets.show', [$project, $pipe->upstreamAsset]) : route('assets.show', $pipe->upstreamAsset) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">View<span class="sr-only">, {{ $asset->name }}</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="border-t border-gray-200">
                                        <th colspan="5" scope="colgroup" class="bg-gray-50 py-2 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Downstream</th>
                                    </tr>
                                    @foreach ($asset->downstreamPipes as $pipe)
                                    <tr>
                                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm text-gray-900 dark:text-white sm:pl-0">{{ $pipe->downstreamAsset->fullName }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-300"></td>
                                        <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="{{ isset($project) ? route('projects.assets.edit', [$project, $pipe->downstreamAsset]) : route('assets.edit', $pipe->downstreamAsset) }}" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $asset->name }}</span></a>
                                            <a href="{{ isset($project) ? route('projects.assets.show', [$project, $pipe->downstreamAsset]) : route('assets.show', $pipe->downstreamAsset) }}" class="text-indigo-600 hover:text-indigo-900 pl-3">View<span class="sr-only">, {{ $asset->name }}</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
