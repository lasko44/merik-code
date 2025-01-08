<script setup>
import MainNavMenu from "@/Shared/Menus/MainNavMenu.vue";
import {COLORS} from "@/Shared/Typography/utils/classes.js";
import {optionalProp} from "@/Shared/Props/common.js";

defineProps({user: optionalProp})

</script>

<template>
  <div class="border-b flex justify-between border-neutral-950 sticky top-0 min-h-10 z-50 w-full py-5 px-10 bg-neutral-900">
      <div :class="COLORS.WHITE">
        Here will be a menu
      </div>
      <section>
        <MainNavMenu :user="user"/>
      </section>
  </div>
</template>

<style scoped>

</style>