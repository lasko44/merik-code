<script setup>

import {defaultTrueBoolProp, optionalStringDefaultProp, requiredStringProp} from "@/Shared/Props/common.js";

const props = defineProps({
  text: requiredStringProp,
  theme: optionalStringDefaultProp("standard"),
  disabled: defaultTrueBoolProp
});

const btnClass = (theme) => {
  switch (theme) {
    case 'standard':
      return "p-2 text-neutral-100 rounded bg-cyan-700 enabled:hover:bg-cyan-800  disabled:opacity-40"
    case 'lite':
      return "p-2 text-neutral-100 rounded bg-cyan-700 hover:bg-cyan-800 disabled:bg-cyan-500"
    case 'dark':
      return "p-2 text-neutral-300 rounded bg-cyan-700 hover:bg-cyan-800 disabled:bg-cyan-600"
  }
};
</script>

<template>
  <button :disabled="disabled" :class="btnClass(theme)">
    {{text}}
  </button>
</template>

<style scoped>

</style>