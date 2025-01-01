<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('customers.index') }}" aria-current="page" :value="'Customers'" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">

                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6 lg:px-8">
                        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-base font-semibold text-gray-900">Customers</h3>
                            </div>
                            @if ($customers->count() > 0)
                            <div class="ml-4 mt-2 shrink-0">
                                <a href="{{ route('customers.create') }}">
                                    <button type="button" class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New customer</button>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if ($customers->count() > 0)
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach($customers as $customer)
                        <li class="relative flex justify-between gap-x-6 py-5 hover:bg-gray-50 px-6 sm:px-8 lg:px-10">
                            <div class="flex min-w-0 gap-x-4">
                                <!--<img class="size-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">-->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                </svg>

                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm/6 font-semibold text-gray-900">
                                        <a href="{{ route('customers.show', $customer) }}">
                                            <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                            {{ $customer->name }}
                                        </a>
                                    </p>
                                    <p class="mt-1 flex text-xs/5 text-gray-500">
                                        <a href="mailto:{{ $customer->email }}" class="relative truncate hover:underline">{{ $customer->email }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="flex shrink-0 items-center gap-x-4">
                                <div class="hidden sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm/6 text-gray-900">Co-Founder / CEO</p>
                                    <p class="mt-1 text-xs/5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                                </div>
                                <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    {{ $customers->links('components.pagination-centered') }}
                    @else
                    @include('components.no-models', ['type' => 'customer', 'url' => route('customers.create')])
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
