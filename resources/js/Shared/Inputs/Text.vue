<script setup>
import { ref, watch } from 'vue';
import {defaultFalseBoolProp, optionalStringDefaultProp, optionalStringProp} from '@/Shared/Props/common.js';
import {COLORS} from "@/Shared/Typography/utils/classes.js";
import Label from "@/Shared/Inputs/Label.vue";

const props = defineProps({
  value: optionalStringProp,
  label: optionalStringProp,
  placeholder: optionalStringProp,
  required: defaultFalseBoolProp,
  readOnly: defaultFalseBoolProp,
  error: defaultFalseBoolProp,
  errorMessage: optionalStringDefaultProp("Something is Wrong")
});

const inputClass = ref('rounded mt-2 p-2 w-full border border-neutral-800 focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2');

watch(() => props.error, (newValue) => {
  if (newValue) {
    inputClass.value = 'rounded mt-2 p-2 w-full border border-red-600 focus:outline-none focus:ring-0 focus:border-red-600 focus:border-2';
  } else {
    inputClass.value = 'rounded mt-2 p-2 w-full border border-neutral-800 focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2';
  }
});

const emit = defineEmits(['update:modelValue']);
</script>


<template>
  <div>
    <Label :label="label" :required="required"/>
    <div>
      <input
          @input="$emit('update:modelValue', $event.target.value)"
          :value="value"
          :readonly="readOnly"
          :placeholder="placeholder"
          :class="inputClass"
          type="text"
      >
    </div>
    <div v-if="error">
      <p :class="COLORS.RED">{{errorMessage}}</p>
    </div>
  </div>

</template>

