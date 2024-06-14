<script setup>
 import MainNav from "@/Shared/MainNav.vue";
</script>

<template>
  <main class="bg-gradient-to-br from-neutral-100 to-neutral-200 " style="height: 100vh;">
    <MainNav></MainNav>
    <slot />
  </main>
</template>

<style scoped>

</style>