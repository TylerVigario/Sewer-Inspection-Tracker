<template>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="text-gray-900 dark:text-gray-100">
            <h3 class="text-lg font-semibold mb-4">{{ title }}</h3>
            <p>{{ message }}</p>
            <button
                @click="incrementCount"
                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
            >
                Clicked {{ count }} times
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    title: {
        type: String,
        default: 'Example Vue Component'
    },
    message: {
        type: String,
        default: 'This is a sample Vue 3 component integrated with Laravel!'
    }
});

const count = ref(0);

const incrementCount = () => {
    count.value++;
};
</script>
