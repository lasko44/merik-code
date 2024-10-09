<script setup>

import {requiredStringProp} from "@/Shared/Props/common.js";
import {ref} from "vue";
import {route} from "ziggy-js";

const props = defineProps({
  routeAction: requiredStringProp,
  path: requiredStringProp
});

const loading = ref(false);
const showError = ref(false);
const btnDisabled = ref(true);

</script>

<template>

</template>

<style scoped>

</style>