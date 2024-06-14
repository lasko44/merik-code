<script setup>

import {defaultFalseBoolProp, requiredStringProp, themeColorProp} from "@/Shared/Props/common.js";
import {COLORS, TEXT_SIZES, WEIGHT} from "@/Shared/Typography/utils/classes.js";

defineProps({
  required: defaultFalseBoolProp,
  label: requiredStringProp,
});

const classes = [COLORS.BLACK, TEXT_SIZES.MD, WEIGHT.LIGHT]
</script>

<template>
  <label class="block" :class="classes">
    {{label}}
    <span v-if="required" :class="COLORS.RED">*</span>
  </label>
</template>

<style scoped>

</style>