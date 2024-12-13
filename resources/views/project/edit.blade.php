<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @isset($project)
            {{ __('Edit Project') }}
            @else
            {{ __('Create Project') }}
            @endisset
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Project Information') }}
                            </h2>

                            @isset($project)
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update project name, customer & other details.") }}
                            </p>
                            @endisset
                        </header>

                        <form method="post" action="{{ route('project.update', $project) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $project->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="customer" class="mb-2" :value="__('Customer')" />
                                <select id="customer" name="customer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach (App\Models\Customer::all() as $customer)
                                    <option  @if ($customer == $project->customer) selected @endif value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('customer')" />
                            </div>

                            <div>
                                <x-input-label for="created" :value="__('Created')" />
                                <x-text-input id="created" type="text" class="mt-1 block w-full" :value="$project->created_at->diffForHumans()" readonly />
                            </div>

                            <div>
                                <x-input-label for="due" :value="__('Due')" />
                                <x-text-input id="due" type="text" class="mt-1 block w-full" :value="old('due', $project->due->diffForHumans())" readonly />
                                <x-input-error class="mt-2" :messages="$errors->get('due')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
