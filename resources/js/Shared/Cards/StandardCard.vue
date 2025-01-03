<script setup>
import {requiredStringProp} from "@/Shared/Props/common.js";

 defineProps({
  title: requiredStringProp
});
</script>

<template>
  <section class="border text-neutral-800 shadow-lg border-neutral-800  bg-neutral-100 p-4 rounded">
    <header class="border-b-2 border-cyan-700">
      <h1 class="font-semibold text-lg">{{title}}</h1>
    </header>
    <section class="my-2">
      <slot></slot>
    </section>
  </section>
</template>

<style scoped>

</style>