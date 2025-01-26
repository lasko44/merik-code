<script setup>
import {requiredStringProp, themeColorProp} from "@/Shared/Props/common.js";


const props = defineProps({
  title: requiredStringProp,
  theme: themeColorProp
})


</script>

<template>
    <h1 :class="['h1']">{{ title }}</h1>
</template>
