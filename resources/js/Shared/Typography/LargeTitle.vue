<script setup>
import {requiredStringProp, themeColorProp} from "@/Shared/Props/common.js";
import {LargeTitle} from "@/Shared/Typography/utils/classes.js";


const props = defineProps({
  title: requiredStringProp,
  theme: themeColorProp
})

const classes = LargeTitle(props.theme);

</script>

<template>
  <div :class="classes">
    {{ title }}
  </div>
</template>
