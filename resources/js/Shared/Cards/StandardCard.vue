<script setup>
import {requiredStringProp} from "@/Shared/Props/common.js";

 defineProps({
  title: requiredStringProp
});
</script>

<template>
  <section class="text-text shadow-md dark:shadow-none dark:text-drk-text bg-background dark:bg-primary dark:bg-opacity-20 dar p-4 rounded dark">
    <header class="border-b-2 border-accent">
      <h1 class="font-semibold text-lg">{{title}}</h1>
    </header>
    <section class="my-2 pb-5">
      <slot></slot>
    </section>
  </section>
</template>

<style scoped>

</style>