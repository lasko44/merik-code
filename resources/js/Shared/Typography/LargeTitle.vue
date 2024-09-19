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
    <h1 :class="[classes, 'h1']">{{ title }}</h1>
</template>
