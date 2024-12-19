<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.show', [$project]) }}" :value="$project->name" />
        @isset($asset)
        <x-breadcrumb href="{{ route('projects.assets.edit', [$project, $asset]) }}" aria-current="page" :value="$asset->fullName" />
        @else
        <x-breadcrumb href="{{ route('projects.assets.create', [$project]) }}" aria-current="page" :value="'New'" />
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{!! isset($asset) ? route('projects.assets.update', [$project, $asset]) : route('projects.assets.store', $project) !!}" class="mt-6 space-y-6">
                        @csrf
                        @method(isset($asset) ? 'patch' : 'post')

                        <div>
                            <x-input-label for="project_id" :value="__('Project')" />
                            <div class="mt-2 grid grid-cols-1">
                                <select id="project_id" name="project_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    @foreach(App\Models\Project::all() as $_project)
                                    <option @if(isset($project) && $project==$_project) selected @endif value="{{ $_project->id }}">{{ $_project->name }}</option>
                                    @endforeach
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('project_id')" />
                        </div>

                        <div>
                            <x-input-label for="asset_type_id" :value="__('Asset Type')" />
                            <div class="mt-2 grid grid-cols-1">
                                <select id="asset_type_id" name="asset_type_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    @foreach(App\Models\AssetType::all() as $assetType)
                                    <option @if(isset($asset) && $asset->type->id == $assetType->id) selected @endif value="{{ $assetType->id }}">{{ $assetType->name }} ({{ $assetType->tag }})</option>
                                    @endforeach
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('asset_type_id')" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', ($asset->name ?? ''))" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'asset-updated')
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
</x-app-layout>
