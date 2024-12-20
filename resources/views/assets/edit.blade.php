<x-app-layout>
    <x-slot name="breadcrumbs">
        <x-breadcrumb href="{{ route('assets.index') }}" :value="'Assets'" />
        <x-breadcrumb href="{{ route('assets.edit', $asset) }}" aria-current="page" :value="$asset->fullName" />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('assets.partials.settings', [
                    'method' => 'patch',
                    'url' => route('assets.update', $asset),
                    'asset' => $asset,
                    ])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
