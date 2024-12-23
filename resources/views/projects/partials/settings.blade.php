@props(['method', 'url', 'project'])

<form method="post" action="{{ $url }}" class="mt-6 space-y-6">
    @csrf
    @method($method)

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $project->name ?? '')" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="project_type_id" :value="__('Project Type')" />
        <div class="mt-2 grid grid-cols-1">
            <select id="project_type_id" name="project_type_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach(App\Models\ProjectType::all() as $projectType)
                <option @if(isset($project) && $project->type == $projectType) selected @endif value="{{ $projectType->id }}">{{ $projectType->name }}</option>
                @endforeach
            </select>
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('project_type_id')" />
    </div>

    <div>
        <x-input-label for="customer_id" :value="__('Customer')" />
        <div class="mt-2 grid grid-cols-1">
            <select id="customer_id" name="customer_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                @foreach(App\Models\Customer::all() as $customer)
                <option @if(isset($project) && $project->customer->id == $customer->id) selected @endif value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
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
            <input datepicker id="due" name="due" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ isset($project) ? $project->due->format('m/d/Y') : '' }}" placeholder="Select date">
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
