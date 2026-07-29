import "./bootstrap";
import { createApp } from 'vue';

import "flowbite";
import "./maps";

// Create Vue app
const app = createApp({});

// Auto-import all Vue components from the components directory
const components = import.meta.glob('./components/**/*.vue', { eager: true });
for (const path in components) {
    const componentName = path.split('/').pop()?.replace(/\.\w+$/, '');
    if (componentName) {
        app.component(componentName, components[path].default);
    }
}

// Mount Vue app only if there's a dedicated Vue container
const vueRoot = document.getElementById('vue-app');
if (vueRoot) {
  app.mount(vueRoot);
}
