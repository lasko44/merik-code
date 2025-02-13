<script setup>
import {requiredStringProp} from "@/Shared/Props/common.js";


const props = defineProps({
  title: requiredStringProp,
})


</script>

<template>
    <h1 :class="['h1']">{{ title }}</h1>
</template>
