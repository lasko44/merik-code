<script setup>

import {defaultTrueBoolProp, optionalStringDefaultProp, requiredStringProp} from "@/Shared/Props/common.js";

const props = defineProps({
  text: requiredStringProp,
  theme: optionalStringDefaultProp("primary"),
  disabled: defaultTrueBoolProp
});

const btnClass = (theme) => {
  switch (theme) {
    case 'primary':
      return "p-2 text-text rounded bg-primary enabled:hover:bg-opacity-70  disabled:opacity-40"
    case 'secondary':
      return "p-2 text-text rounded bg-secondary enabled:hover:bg-opacity-70  disabled:opacity-40"
    case 'accent':
      return "p-2 text-text rounded bg-accent enabled:hover:bg-opacity-70  disabled:opacity-40"
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