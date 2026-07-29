<template>
    <div class="relative" @click.outside="isOpen = false">
        <button
            @click="toggleDropdown"
            type="button"
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
        >
            <slot name="trigger">
                Dropdown
            </slot>
            <svg
                class="ml-2 -mr-0.5 h-4 w-4"
                :class="{ 'rotate-180': isOpen }"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
            >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-if="isOpen"
                class="absolute z-50 mt-2 rounded-md shadow-lg"
                :class="alignmentClasses"
                style="min-width: 12rem;"
            >
                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-gray-700">
                    <slot name="content"></slot>
                </div>
            </div>
        </Transition>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
    align: {
        type: String,
        default: 'right',
        validator: (value) => ['left', 'right'].includes(value)
    },
    width: {
        type: String,
        default: '48',
        validator: (value) => ['48', '64', 'full'].includes(value)
    }
});

const isOpen = ref(false);

const toggleDropdown = () => {
    isOpen.value = !isOpen.value;
};

const alignmentClasses = computed(() => {
    if (props.align === 'left') {
        return 'origin-top-left left-0';
    }
    return 'origin-top-right right-0';
});
</script>
