@props(['url', 'method', 'project' => null, 'pipe' => null])

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
        <x-input-label for="pipe_id" :value="__('Pipe')" />
        <div class="mt-2 grid grid-cols-1">
            <select id="pipe_id" name="pipe_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach($project->pipes as $_pipe)
                <option @if($pipe==$_pipe) selected @endif value="{{ $_pipe->id }}">{{ isset($_pipe) ? $_pipe->upstreamAsset->fullName . ' -> ' . $_pipe->downstreamAsset->fullName : '' }}</option>
                @endforeach
            </select>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('pipe_id')" />
    </div>

    <div>
        <x-input-label for="distance" :value="__('Distance')" />
        <div class="mt-2">
            <div class="flex items-center rounded-md bg-white px-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="number" value="{{ $inspection->distance ?? 0.00 }}" step="0.1" min="0.00" name="distance" id="distance" class="border-none focus:ring-0 block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="0.00" aria-describedby="price-currency" required>
                <div id="distance-measurement" class="shrink-0 select-none text-base text-gray-500 sm:text-sm/6">ft</div>
            </div>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('distance')" />
    </div>

    <div x-data="{ enabled: {{ !isset($pipe) || $pipe->downstream ? 'true' : 'false' }} }">
        <input type="text" name="downstream" id="downstream" :value="enabled ? 1 : 0" class="hidden" />
        <div @click="enabled = !enabled" class="flex items-center justify-between">
            <span class="flex grow flex-col">
                <span class="text-sm/6 font-medium text-gray-900" id="direction-label">Direction: <span class="text-gray-700">Downstream</span></span>
                <span class="text-sm text-gray-500" id="direction-description">Was the inspection done from upstream to downstream?</span>
            </span>
            <button type="button" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" :class="enabled ? 'bg-indigo-600' : 'bg-gray-200'" role="switch" :aria-checked="enabled" aria-labelledby="downstream-label" aria-describedby="downstream-description">
                <span aria-hidden="true" class="pointer-events-none inline-block size-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="enabled ? 'translate-x-5' : 'translate-x-0'"></span>
            </button>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('downstream')" />
    </div>

    <div x-data="{ enabled: {{ isset($inspection) && $inspection->completed ? 'true' : 'false' }} }">
        <input type="text" name="completed" id="completed" :value="enabled ? 1 : 0" class="hidden" />
        <div @click="enabled = !enabled" class="flex items-center justify-between">
            <span class="flex grow flex-col">
                <span class="text-sm/6 font-medium text-gray-900" id="completed-label">Completed</span>
                <span class="text-sm text-gray-500" id="completed-description">Was the inspection completed without issue?</span>
            </span>
            <button type="button" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" :class="enabled ? 'bg-indigo-600' : 'bg-gray-200'" role="switch" :aria-checked="enabled" aria-labelledby="completed-label" aria-describedby="completed-description">
                <span aria-hidden="true" class="pointer-events-none inline-block size-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="enabled ? 'translate-x-5' : 'translate-x-0'"></span>
            </button>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('completed')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'inspection-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
