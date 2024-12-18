<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('customers.index') }}" :value="'Customers'" />
        @isset($customer)
        <x-breadcrumb href="{{ route('customers.edit', [$customer]) }}" aria-current="page" :value="$customer->fullName" />
        @else
        <x-breadcrumb href="{{ route('customers.create') }}" aria-current="page" :value="'Create'" />
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{!! isset($customer) ? route('customers.update', $customer) : route('customers.store') !!}" class="mt-6 space-y-6">
                        @csrf
                        @method(isset($customer) ? 'patch' : 'post')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', ($customer->name ?? ''))" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'customer-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
