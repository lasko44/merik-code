<script setup>
 import MainNav from "@/Shared/MainNav.vue";
 import MainFooter from "@/Shared/MainFooter.vue";
</script>

<template>
  <MainNav></MainNav>
  <main class="bg-gradient-to-br mb-auto from-neutral-100 to-neutral-200" style="min-height: 100vh;">
    <slot />
  </main>
  <MainFooter/>
</template>

<style scoped>

</style>