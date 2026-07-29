<x-app-layout>
    <x-slot name="breadcrumbs">
        <li>
            <div class="flex items-center">
                <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                    data-slot="icon">
                    <path fill-rule="evenodd"
                        d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="ml-4 text-sm font-medium text-gray-500">Vue Examples</span>
            </div>
        </li>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Example Component Usage -->
            <example-component
                title="Welcome to Vue 3!"
                message="This component is rendered using Vue 3 with the Composition API."
            ></example-component>

            <!-- Another Example -->
            <example-component
                title="Interactive Component"
                message="Click the button below to see Vue's reactivity in action!"
            ></example-component>

            <!-- Standard Blade/HTML -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Mixing Blade & Vue</h3>
                    <p>You can use standard Blade templates alongside Vue components seamlessly.</p>
                    <p class="mt-2">Current user: <strong>{{ auth()->user()->name ?? 'Guest' }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
