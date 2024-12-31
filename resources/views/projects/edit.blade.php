<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('projects.index') }}" :value="'Projects'" />
        <x-breadcrumb href="{{ route('projects.edit', $project) }}" aria-current="page" :value="$project->name" />
    </x-slot>

    <div class="pt-8 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" x-data="{ selected: 'settings' }" x-query-string="selected">
                <div class="relative border-b border-gray-200 pb-5 sm:pb-0">
                    <div class="mt-6">
                        <div class="grid grid-cols-1 sm:hidden">
                            <select aria-label="Select a tab" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                <option :selected="selected == 'settings'" @click="selected = 'settings'">Settings</option>
                                <option :selected="selected == 'map'" @click="selected = 'map'">Map</option>
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end fill-gray-500" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="hidden sm:block">
                            <nav class="-mb-px flex space-x-8">
                                <a href="#" @click.prevent @click="selected = 'settings'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium" :class="selected == 'settings' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'" :aria-current="selected == 'settings' ? 'page' : ''">
                                    Settings
                                </a>
                                <a href="#" @click.prevent @click="selected = 'map'" class="'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium" :class="selected == 'map' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'" :aria-current="selected == 'map' ? 'page' : ''">
                                    Map
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>

                <form method="post" action="{{ route('projects.update', $project) }}">
                    @csrf
                    @method("patch")

                    <div x-cloak x-show="selected == 'settings'" x-transition>
                        @include('projects.partials.settings')
                    </div>

                    <div x-cloak x-show="selected == 'map'" x-transition>
                        @include('projects.partials.map')
                    </div>

                    @include('projects.partials.save-button')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
