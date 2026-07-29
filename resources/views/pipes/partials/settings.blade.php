@props(['method', 'url', 'project' => null])

<form method="post" action="{{ $url }}" class="mt-6 space-y-6">
    @csrf
    @method($method)

    @if(!isset($project))
    <div>
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

    <div>
        <x-input-label for="upstream_asset_id" :value="__('Upstream Asset')" />
        <div class="mt-2 grid grid-cols-1">
            <select id="upstream_asset_id" name="upstream_asset_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach($project->assets as $asset)
                <option @if(isset($pipe) && $pipe->upstreamAsset->is($asset)) selected @endif value="{{ $asset->id }}">{{ $asset->fullName }}</option>
                @endforeach
            </select>
            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('upstream_asset_id')" />
    </div>

    <div>
        <x-input-label for="downstream_asset_id" :value="__('Downstream Asset')" />
        <div class="mt-2 grid grid-cols-1">
            <select id="downstream_asset_id" name="downstream_asset_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach($project->assets as $asset)
                <option @if(isset($pipe) && $pipe->downstreamAsset->is($asset)) selected @endif value="{{ $asset->id }}">{{ $asset->fullName }}</option>
                @endforeach
            </select>
            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('downstream_asset_id')" />
    </div>

    <div>
        <x-input-label for="size" :value="__('Size')" />
        <div class="mt-2">
            <div class="flex items-center rounded-md bg-white px-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="number" value="{{ $pipe->size ?? 0.0 }}" step="1" min="0.0" placeholder="4" name="size" id="size" class="border-none focus:ring-0 block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" aria-describedby="size-measurement">
                <div id="size-measurement" class="shrink-0 select-none text-base text-gray-500 sm:text-sm/6">in</div>
            </div>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('size')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'pipe-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
