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
  <main class="bg-background pb-20 text-text dark:bg-drk-background dark:text-drk-text" style="min-height: 100vh;">
    <slot />
  </main>
  <MainFooter/>
</template>

<style scoped>

</style>