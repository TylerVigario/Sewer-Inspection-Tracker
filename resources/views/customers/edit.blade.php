<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('customers.index') }}" :value="'Customers'" />
        <x-breadcrumb href="{{ route('customers.edit', $customer) }}" aria-current="page" :value="$customer->fullName" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('customers.partials.settings', [
                'url' => route('customers.update', $customer),
                'method' => 'patch',
                'customer' => $customer,
                ])
            </div>
        </div>
    </div>
</x-app-layout>
