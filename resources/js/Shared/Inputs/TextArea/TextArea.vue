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
import Spinner from "@/Shared/Indicators/Spinner.vue";
import resize from "@/Directives/resize.js";
const props = defineProps({
  value: optionalStringProp,
  label: optionalStringProp,
  enableAi: defaultFalseBoolProp,
  payload: optionalStringProp,
  aiRoute: optionalStringProp,
  placeholder: optionalStringProp,
  required: defaultFalseBoolProp,
  error: defaultFalseBoolProp,
  errorMessage: optionalStringDefaultProp("Something is Wrong"),
  rows: defaultOptionalNumber(6)
});

const inputClass = ref('rounded p-2 w-full border border-neutral-800 focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2');
const textValue = ref(null);
const emit = defineEmits(['update:modelValue'])
const vResize = resize;
const positionLeft = ref(300);
const showSpinner = ref(false);

watch(() => props.error, (newValue) => {
  if (newValue) {
    inputClass.value = 'rounded p-2 w-full border border-red-600 focus:outline-none focus:ring-0 focus:border-red-600 focus:border-2';
  } else {
    inputClass.value = 'rounded p-2 w-full border border-neutral-800 focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2';
  }
});

function updateText(value) {
  showSpinner.value = false
  textValue.value = value;
  emit('update:modelValue', textValue.value);
}
function resized(){
  const textArea = document.getElementById("dynamic-text-area");
  positionLeft.value = Math.round(textArea.getBoundingClientRect().width/2.25);
}

function updateSpinner(value) {
  showSpinner.value = value;
}


</script>

<template>
  <div>
    <div id="dynamic-text-area" v-resize="resized">
      <Label :label="label" :required="required"/>
      <GeminiGenerator :payload="payload" @update="updateText" @spinner="updateSpinner" :route-action="aiRoute" v-if="enableAi"/>
      <textarea :class="inputClass"  :value="textValue" :rows="rows"/>
      <Spinner v-if="showSpinner" :class="['relative','bottom-[250px]', 'mb-[-40px]']" :style="`left: ${positionLeft}px`"/>
    </div>
    <div v-if="error">
      <p :class="COLORS.RED">{{errorMessage}}</p>
    </div>
  </div>
</template>
