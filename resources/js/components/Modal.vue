<template>
    <Teleport to="body">
        <Transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0"
            enter-to-class="transform opacity-100"
            leave-active-class="transition ease-in duration-200"
            leave-from-class="transform opacity-100"
            leave-to-class="transform opacity-0"
        >
            <div
                v-if="show"
                class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                @click="close"
            >
                <Transition
                    enter-active-class="transition ease-out duration-200"
                    enter-from-class="transform opacity-0"
                    enter-to-class="transform opacity-100"
                    leave-active-class="transition ease-in duration-200"
                    leave-from-class="transform opacity-100"
                    leave-to-class="transform opacity-0"
                >
                    <div v-if="show" class="fixed inset-0 transform transition-all">
                        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                    </div>
                </Transition>

                <Transition
                    enter-active-class="transition ease-out duration-200"
                    enter-from-class="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to-class="transform opacity-100 translate-y-0 sm:scale-100"
                    leave-active-class="transition ease-in duration-200"
                    leave-from-class="transform opacity-100 translate-y-0 sm:scale-100"
                    leave-to-class="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div
                        v-if="show"
                        class="mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto"
                        :class="maxWidthClass"
                        @click.stop
                    >
                        <slot></slot>
                    </div>
                </Transition>
            </div>
        </Transition>
    </Teleport>
</template>

<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false
    },
    maxWidth: {
        type: String,
        default: '2xl',
        validator: (value) => ['sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'].includes(value)
    },
    closeable: {
        type: Boolean,
        default: true
    }
});

const emit = defineEmits(['close']);

const maxWidthClass = computed(() => {
    return {
        'sm': 'sm:max-w-sm',
        'md': 'sm:max-w-md',
        'lg': 'sm:max-w-lg',
        'xl': 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
        '3xl': 'sm:max-w-3xl',
        '4xl': 'sm:max-w-4xl',
        '5xl': 'sm:max-w-5xl',
        '6xl': 'sm:max-w-6xl',
        '7xl': 'sm:max-w-7xl'
    }[props.maxWidth];
});

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape' && props.show) {
        close();
    }
};

watch(() => props.show, (newVal) => {
    if (newVal) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = null;
    }
});

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);
    document.body.style.overflow = null;
});
</script>
