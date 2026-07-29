<div class="flex items-center gap-4 border-t border-gray-200 mt-8 pt-6">
    <x-primary-button>{{ __('Save') }}</x-primary-button>

    <x-input-error class="mt-2" :messages="$errors->get('lat')" />
    <x-input-error class="mt-2" :messages="$errors->get('lng')" />
    <x-input-error class="mt-2" :messages="$errors->get('city')" />
    <x-input-error class="mt-2" :messages="$errors->get('state')" />

    @if (session('status') === 'project-updated')
    <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
    @endif
</div>
