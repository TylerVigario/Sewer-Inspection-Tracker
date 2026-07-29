# Vue.js Migration Guide

## Overview
This Laravel project has been migrated from Livewire + Alpine.js to Vue 3 with the Composition API.

## What Changed

### 1. Dependencies
- **Removed:** Livewire, Alpine.js, alpine-query-string
- **Added:** Vue 3, @vitejs/plugin-vue

### 2. Configuration Files

#### vite.config.js
Added Vue plugin for proper .vue file compilation:
```javascript
import vue from '@vitejs/plugin-vue';
```

#### resources/js/app.js
Replaced Livewire initialization with Vue app creation:
- Removed Livewire and Alpine imports
- Added Vue 3 createApp
- Auto-imports all components from `resources/js/components/*.vue`

### 3. Layout Updates

#### resources/views/layouts/app.blade.php
- Removed `@livewireStyles` and `@livewireScriptConfig`
- Added `id="app"` to the main container for Vue mounting

### 4. Component Structure

New Vue components are located in `resources/js/components/`:
- **ExampleComponent.vue** - Sample component with props and reactivity
- **Dropdown.vue** - Reusable dropdown component with transitions
- **Modal.vue** - Modal dialog component with teleport

## Using Vue Components

### In Blade Templates

You can use Vue components directly in your Blade templates using kebab-case:

```blade
<example-component
    title="My Title"
    message="My message"
></example-component>
```

### Auto-registration

All `.vue` files in `resources/js/components/` are automatically registered and available globally. The component name is derived from the filename:
- `ExampleComponent.vue` → `<example-component>`
- `MyCustomComponent.vue` → `<my-custom-component>`

## Creating New Components

1. Create a new `.vue` file in `resources/js/components/`
2. Use the Composition API with `<script setup>`
3. The component will be auto-registered on next build

Example:
```vue
<template>
    <div>{{ message }}</div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    message: String
});
</script>
```

## Migration Notes

### Alpine.js to Vue

If you need to convert Alpine.js directives to Vue:

| Alpine | Vue Equivalent |
|--------|---------------|
| `x-data` | `<script setup>` with `ref()` |
| `x-show` | `v-show` |
| `x-if` | `v-if` |
| `x-for` | `v-for` |
| `@click` | `@click` (same) |
| `:class` | `:class` (same) |

### Keeping Alpine.js (Optional)

If you want to keep Alpine.js for simple interactions while using Vue for complex components:

1. Re-add Alpine to package.json
2. Initialize Alpine in app.js (without Livewire)
3. Use Alpine for simple directives, Vue for components

## Building Assets

### Development
```bash
npm run dev
```

### Production
```bash
npm run build
```

## Example Routes

To see Vue in action, you can add a route:

```php
// routes/web.php
Route::get('/vue-example', function () {
    return view('vue-example');
})->middleware('auth');
```

## Next Steps

1. Run `npm install` to install Vue dependencies
2. Run `composer update` to remove Livewire
3. Convert existing Livewire components to Vue components
4. Replace Alpine.js directives with Vue equivalents where needed
5. Test thoroughly

## Resources

- [Vue 3 Documentation](https://vuejs.org/)
- [Vue 3 Composition API](https://vuejs.org/guide/extras/composition-api-faq.html)
- [Laravel with Vue](https://laravel.com/docs/vite#vue)
