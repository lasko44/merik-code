<script setup>
import { ref, onMounted, toRaw } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import ComponentWrapper from "@/Pages/ComponentLibrary/utils/ComponentWrapper.vue";
import {Head} from "@inertiajs/vue3";

const props = defineProps({
  components: {
    type: Array,
    required: false,
    default: () => [],
  },
});

const dynamicComponents = ref({});

const loadComponents = async () => {
  const loadedComponents = {};
  for (const rawComponent of props.components) {
    const component = toRaw(rawComponent); // Unwrap reactive object
    try {
      // Use a relative path for dynamic imports
      const componentPath = `/resources/js/Shared/${component.path}`;
      console.log(`Loading component from: ${componentPath}`);
      loadedComponents[component.name] = {
        component: (await import(/* @vite-ignore */ componentPath)).default,
        description: component.description,
      };
    } catch (error) {
      console.error(`Failed to load component ${component.name} at ${component.path}:`, error);
    }
  }
  dynamicComponents.value = loadedComponents;
};

onMounted(loadComponents);
</script>

<template>
  <Head>
    <title>Component Library</title>
    <meta name="description" content="Register Component">
  </Head>
  <main-layout>
    <div class="flex justify-center">
      <div class="w-1/2">
        <component-wrapper title="Component Library" :description="'Components are the building blocks of your application. Here you can find a list of all the components that are available to you.'">
          <div v-for="(data, name) in dynamicComponents" :key="name" class="mb-6">
            <h3 class="text-lg font-bold mb-2">{{ name }}</h3>
            <component :is="data.component" />
            <p class="mt-2 text-text dark:text-drk-text">{{ data.description }}</p>
          </div>
        </component-wrapper>
      </div>
    </div>
  </main-layout>
</template>

<style scoped>
/* Add your styles here */
</style>
