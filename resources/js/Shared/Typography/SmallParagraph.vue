<script setup>
import { SmallParagraph } from "@/Shared/Typography/utils/classes.js";
import { requiredStringProp, themeColorProp } from "@/Shared/Props/common.js";

const props = defineProps({
  content: requiredStringProp,
  theme: themeColorProp
});

const classes = SmallParagraph(props.theme);

</script>

<template>
  <p :class="classes">{{content}}</p>
</template>

<style scoped>

</style>