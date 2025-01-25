<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('employees.index') }}" aria-current="page" :value="'Employees'" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xs sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">

                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6 lg:px-8">
                        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-base font-semibold text-gray-900">Employees</h3>
                            </div>
                            <div class="ml-4 mt-2 shrink-0">
                                <a href="{{ route('employees.create') }}">
                                    <button type="button" class="relative inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">New employee</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <x-modals.confirm-delete>
                        <ul role="list" class="divide-y divide-gray-100">
                            @foreach($users as $user)
                            <li class="flex justify-between gap-x-6 py-5 px-6 sm:px-8 lg:px-10" x>
                                <div class="flex min-w-0 gap-x-4">
                                    <!--<img class="size-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">-->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                    </svg>
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm/6 font-semibold text-gray-900">
                                            <a href="#" class="hover:underline">{{ $user->fullName }}</a>
                                        </p>
                                        <p class="mt-1 flex text-xs/5 text-gray-500">
                                            <a href="mailto:{{ $user->email }}" class="truncate hover:underline">{{ $user->email }}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex shrink-0 items-center gap-x-6">
                                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                                        <p class="text-sm/6 text-gray-900">Lead Field Operator</p>
                                        <p class="mt-1 text-xs/5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                                    </div>
                                    <div class="relative flex-none" x-data="{ show: false }">
                                        <button type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900" id="options-menu-4-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                            </svg>
                                        </button>
                                        <div x-cloak x-show="show" x-transition @click.outside="show = ''" class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-4-button" tabindex="-1">
                                            <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-4-item-0">View profile<span class="sr-only">, Courtney Henry</span></a>
                                            <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="options-menu-4-item-1">Message<span class="sr-only">, Courtney Henry</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        {{ $users->links('components.pagination-centered') }}
                        </x-modals.confirm.delete>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
