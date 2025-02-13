<script setup>
import { ref, watch } from 'vue';
import { defaultFalseBoolProp, optionalStringDefaultProp, optionalStringProp } from '@/Shared/Props/common.js';
import { COLORS } from "@/Shared/Typography/utils/classes.js";
import Label from "@/Shared/Inputs/Label.vue";

// Define props
const props = defineProps({
  value: optionalStringProp,
  label: optionalStringProp,
  id: optionalStringDefaultProp("text-input"),
  placeholder: optionalStringProp,
  required: defaultFalseBoolProp,
  readOnly: defaultFalseBoolProp,
  error: defaultFalseBoolProp,
  errorMessage: optionalStringDefaultProp("Something is Wrong"),
});

// Reactive state for the input value
const textValue = ref(props.value ?? "");

// Watch for changes to the value prop and update textValue
watch(() => props.value, (newValue) => {
  textValue.value = newValue ?? "";
});

// Dynamic input class based on error state
const inputClass = ref('rounded border-none mt-2 p-2 w-full shadow-md dark:shadow-md text-text dark:bg-primary/10 dark:text-drk-text focus:outline-none focus:ring-2 focus:ring-accent');
watch(() => props.error, (newValue) => {
  if (newValue) {
    inputClass.value = 'rounded mt-2 p-2 w-full border border-red-600 focus:outline-none focus:ring-0 focus:border-red-600 focus:border-2';
  } else {
    inputClass.value = 'rounded mt-2 p-2 w-full shadow-md dark:shadow-md text-text dark:bg-primary/10 dark:text-drk-text focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2';
  }
});

// Emit event to update modelValue
const emit = defineEmits(['update:modelValue']);
function update(value) {
  textValue.value = value; // Update local state
  emit("update:modelValue", value); // Emit value to parent
}
</script>

<template>
  <div>
    <Label :label="label" :for-id="id" :required="required" />
    <div>
      <input
          @input="update($event.target.value)"
          :value="textValue"
          :id="id"
          :readonly="readOnly"
          :placeholder="placeholder"
          :class="inputClass"
          type="text"
          autocomplete="off"
      />
    </div>
    <div v-if="error">
      <p :class="COLORS.RED">{{ errorMessage }}</p>
    </div>
  </div>
</template>


