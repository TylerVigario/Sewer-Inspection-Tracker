<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <div class="flex-auto w-50">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Projects') }}
                </h2>
            </div>
            <div class="flex-auto w-50 content-end">
                <select id="customer" name="customer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="0">All Customers</option>
                    @foreach (App\Models\Customer::all() as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($projects as $project)
                        <a href="{{ route('project.show', $project) }}">
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm/6 font-semibold text-white-900">{{ $project->name }}</p>
                                        <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $project->customer->name }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm/6 text-white-900">{{ $project->assets()->count() }} assets, {{ $project->pipes()->count() }} pipes</p>
                                    <p class="mt-1 text-xs/5 text-gray-500"><b>{{ __('Due:') }}</b> {{ $project->due->diffForHumans() }}</p>
                                </div>
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
