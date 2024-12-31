<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('employees.index') }}" aria-current="page" :value="'Employees'" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">

                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6 lg:px-8">
                        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-base font-semibold text-gray-900">Employees</h3>
                            </div>
                            <div class="ml-4 mt-2 shrink-0">
                                <a href="{{ route('employees.create') }}">
                                    <button type="button" class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New employee</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 sm:px-8 lg:px-10">
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
