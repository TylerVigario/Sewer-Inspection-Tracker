@props(['method', 'url', 'project' => null, 'asset' => null])

<form method="post" action="{{ $url }}" class="mt-0 space-y-6" x-data="{ tag: '{{ $asset->type->tag ?? 'MH' }}', selected: 'details' }" x-query-string="selected">
    @csrf
    @method($method)

    <div class="!mt-0">
        <div class="grid grid-cols-1 sm:hidden">
            <select aria-label="Select a tab" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                <option :selected="selected == 'details'" @click="selected = 'details'">Details</option>
                <option :selected="selected == 'location'" @click="selected = 'location'">Location</option>
            </select>
            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end fill-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="hidden sm:block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a href="#" @click.prevent @click="selected = 'details'" class="whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium" :class="selected == 'details' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'" :aria-current="selected == 'details' ? 'page' : ''">
                        Details
                    </a>
                    <a href="#" @click.prevent @click="selected = 'location'" class="whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium" :class="selected == 'location' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'" :aria-current="selected == 'location' ? 'page' : ''">
                        Location
                    </a>
                </nav>
            </div>
        </div>
    </div>

    @if(!isset($project))
    <div x-cloak x-show="selected == 'details'" x-transition>
        <x-input-label for="project_id" :value="__('Project')" />
        <div class="mt-2 grid grid-cols-1">
            <select id="project_id" name="project_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach(App\Models\Project::all() as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('project_id')" />
    </div>
    @endif

    <div x-cloak x-show="selected == 'details'" x-transition>
        <x-input-label for="asset_type_id" :value="__('Asset Type')" />
        <div class="mt-2 grid grid-cols-1">
            <select id="asset_type_id" name="asset_type_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach(App\Models\AssetType::all() as $assetType)
                <option @click="tag = '{{ $assetType->tag }}'" @if(isset($asset) && $asset->type->id == $assetType->id) selected @endif value="{{ $assetType->id }}">{{ $assetType->name }}</option>
                @endforeach
            </select>
            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('asset_type_id')" />
    </div>

    <div x-cloak x-show="selected == 'details'" x-transition>
        <x-input-label for="name" :value="__('Name')" />
        <div class="mt-2 flex">
            <div class="flex shrink-0 items-center rounded-l-md bg-white px-3 text-base text-gray-500 outline outline-1 -outline-offset-1 outline-gray-300 sm:text-sm/6" x-text="tag">{{ $asset->type->tag ?? 'MH' }}</div>
            <input type="text" name="name" id="name" class="-ml-px block w-full grow rounded-r-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="{{ $asset->name ?? '' }}" />
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div x-cloak x-show="selected == 'details'" x-transition>
        <x-input-label for="depth" :value="__('Depth')" />
        <div class="mt-2">
            <div class="flex items-center rounded-md bg-white px-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="number" value="{{ $asset->depth ?? 0.0 }}" step="1" min="0.0" name="depth" id="depth" class="border-none focus:ring-0 block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" aria-describedby="depth-measurement">
                <div id="depth-measurement" class="shrink-0 select-none text-base text-gray-500 sm:text-sm/6">in</div>
            </div>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('depth')" />
    </div>

    <div x-cloak x-show="selected == 'location'" x-transition>
        <div class="map border-b border-gray-900/10 pb-6" data-zoom="21" data-center="{{ implode(',', $position) }}">
            <div class="viewport"></div>
            <div class="marker" data-lat="{{ implode(',', $position) }}" data-title="0" data-geocode data-clickable data-draggable>
                <input type="hidden" name="lat" id="lat" value="{{ $position[0] }}" />
                <input type="hidden" name="lng" id="lng" value="{{ $position[1] }}" />
            </div>
            <div class="py-4" x-data="{ enabled: false }">
                <div class="mt-6">
                    <div @click="enabled = !enabled" class="flex items-center justify-between">
                        <span class="flex grow flex-col">
                            <span class="text-sm/6 font-medium text-gray-900" id="direction-label">Address</span>
                            <span class="text-sm text-gray-500" id="direction-description">Does the asset belong to a property?</span>
                        </span>
                        <button type="button" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" :class="enabled ? 'bg-indigo-600' : 'bg-gray-200'" role="switch" :aria-checked="enabled" aria-labelledby="downstream-label" aria-describedby="downstream-description">
                            <span aria-hidden="true" class="pointer-events-none inline-block size-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="enabled ? 'translate-x-5' : 'translate-x-0'"></span>
                        </button>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>
                <div x-show="enabled" class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="number" class="block text-sm/6 font-medium text-gray-900">House Number</label>
                        <div class="mt-2">
                            <input type="text" name="number" id="number" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="street_name" class="block text-sm/6 font-medium text-gray-900">Street Name</label>
                        <div class="mt-2">
                            <input type="text" name="street_name" id="street_name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm/6 font-medium text-gray-900">City</label>
                        <div class="mt-2">
                            <input type="text" name="city" id="city" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="state" class="block text-sm/6 font-medium text-gray-900">State / Province</label>
                        <div class="mt-2">
                            <input type="text" name="state" id="state" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="zip_code" class="block text-sm/6 font-medium text-gray-900">ZIP / Postal code</label>
                        <div class="mt-2">
                            <input type="text" name="zip_code" id="zip_code" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        <x-input-error class="mt-2" :messages="$errors->get('address_id')" />
        <x-input-error class="mt-2" :messages="$errors->get('lat')" />
        <x-input-error class="mt-2" :messages="$errors->get('lng')" />
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
