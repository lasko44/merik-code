<script setup>

import {optionalStringProp, requiredStringProp} from "@/Shared/Props/common.js";
import {ref} from "vue";
import {route} from "ziggy-js";
import {COLORS} from "@/Shared/Typography/utils/classes.js";
import {BACKGROUND} from "@/Shared/Inputs/utils/classes.js";
import Button from "@/Shared/Inputs/Button.vue";

const props = defineProps({
  routeAction: requiredStringProp,
  payload: optionalStringProp
});

const loading = ref(false);
const showError = ref(false);
const btnDisabled = ref(true);

function generate() {

}

</script>

<template>
  <div class="flex w-full justify-between rounded p-2" :class="[COLORS.WHITE, BACKGROUND.BLUE]">
    <p class="mt-2">This field is AI enabled! Click Generate to fill this field</p>
    <Button @click:theme="'lite'" text="Generate"/>
  </div>

</template>

<style scoped>

</style>