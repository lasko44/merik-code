<script setup>

import {defaultFalseBoolProp, requiredStringProp} from "@/Shared/Props/common.js";
import Label from "@/Shared/Inputs/Label.vue";
import {ref} from "vue";

const props = defineProps({
  label: requiredStringProp,
  value: defaultFalseBoolProp,
  required: defaultFalseBoolProp,
});

const emit = defineEmits(['update:modelValue']);
const checked = ref(props.value);
function check(){
  checked.value = !checked.value;
  emit('update:modelValue', checked.value);
}

</script>

<template>
  <div class="flex row">
    <input class="mt-[5px] rounded focus:ring-0 text-cyan-700" type="checkbox" @input="check">
    <Label class="ml-2" :label="label"/>
  </div>

</template>

