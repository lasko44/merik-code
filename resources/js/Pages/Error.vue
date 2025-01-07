<script setup>
import { computed } from 'vue'
import MainLayout from "@/Layouts/MainLayout.vue";
import {Head} from "@inertiajs/vue3";

const props = defineProps({ status: Number, user: Object });

const title = computed(() => {
  return {
    503: '503: Service Unavailable',
    500: '500: Server Error',
    404: '404: Page Not Found',
    403: '404: Page Not Found',
  }[props.status];
});

const images = [
  '/images/cat-2.jpg',
  '/images/deer.jpg',
  '/images/dog-1.jpg',
  '/images/monkey.jpg',
  '/images/ostritch.jpg',
];

// Randomly select an image
const randomImage = images[Math.floor(Math.random() * images.length)];

const description = computed(() => {
  return {
    503: 'Sorry, we are doing some maintenance. Please check back soon.',
    500: 'Whoops, something went wrong on our servers.',
    404: 'Sorry, the page you are looking for could not be found. Here\'s a funny animal picture',
    403: 'Sorry, the page you are looking for could not be found. Here\'s a funny animal picture',
  }[props.status];
});
</script>

<template>
  <Head>
    <title>{{ title }}</title>
    <meta name="description" :content="description">
  </Head>
  <MainLayout :user="user">
    <div class="w-full flex min-h-screen max-h-screen">
      <!-- Left Section -->
      <div class="flex flex-col justify-center bg-cyan-700 items-center w-1/2 text-center">
        <div id="left-section">
          <h1 class="text-white text-4xl font-bold mb-4">{{ title }}</h1>
          <div class="text-white text-lg">{{ description }}</div>
        </div>
      </div>

      <!-- Right Section -->
      <div class="w-1/2">
        <img :src="randomImage" alt="Random Animal" class="w-full h-full object-cover">
      </div>
    </div>
  </MainLayout>
</template>
