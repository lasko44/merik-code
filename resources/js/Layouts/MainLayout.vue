<script setup>
 import MainNav from "@/Shared/MainNav.vue";
 import MainFooter from "@/Shared/MainFooter.vue";
 import {optionalProp} from "@/Shared/Props/common.js";

 defineProps({
   user: optionalProp
 })
</script>

<template>
  <MainNav :user="user"></MainNav>
  <main class="bg-gradient-to-br mb-auto from-neutral-100 to-neutral-200" style="min-height: 100vh;">
    <slot />
  </main>
  <MainFooter/>
</template>

<style scoped>

</style>