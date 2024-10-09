<script setup>

import {COLORS} from "@/Shared/Typography/utils/classes.js";
import {
  defaultFalseBoolProp,
  defaultOptionalNumber,
  optionalStringDefaultProp,
  optionalStringProp
} from "@/Shared/Props/common.js";
import {ref, watch} from "vue";
import Label from "@/Shared/Inputs/Label.vue";
import GeminiGenerator from "@/Shared/Inputs/TextArea/components/GeminiGenerator.vue";
const props = defineProps({
  value: optionalStringProp,
  label: optionalStringProp,
  enableAi: defaultFalseBoolProp,
  aiRoute: optionalStringProp,
  placeholder: optionalStringProp,
  required: defaultFalseBoolProp,
  error: defaultFalseBoolProp,
  errorMessage: optionalStringDefaultProp("Something is Wrong"),
  rows: defaultOptionalNumber(6)
});

const inputClass = ref('rounded mt-2 p-2 w-full border border-neutral-800 focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2');

watch(() => props.error, (newValue) => {
  if (newValue) {
    inputClass.value = 'rounded mt-2 p-2 w-full border border-red-600 focus:outline-none focus:ring-0 focus:border-red-600 focus:border-2';
  } else {
    inputClass.value = 'rounded mt-2 p-2 w-full border border-neutral-800 focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2';
  }
});
</script>

<template>
  <div>
    <div>
      <Label :label="label" :required="required"/>
      <GeminiGenerator v-if="enableAi"/>
      <textarea :class="inputClass" :rows="rows"></textarea>
    </div>
    <div v-if="error">
      <p :class="COLORS.RED">{{errorMessage}}</p>
    </div>
  </div>
</template>

<style scoped>

</style>