<script setup>
import { ref, watch } from 'vue';
import { defaultFalseBoolProp, optionalStringDefaultProp, optionalStringProp } from '@/Shared/Props/common.js';
import { COLORS } from "@/Shared/Typography/utils/classes.js";
import Label from "@/Shared/Inputs/Label.vue";

// Define props
const props = defineProps({
  value: optionalStringProp,
  label: optionalStringProp,
  error: defaultFalseBoolProp,
  errorMessage: optionalStringDefaultProp("Something is Wrong"),
});

// Local reactive value
const localValue = ref(props.value ?? "");

// Watch for changes to the `value` prop and update `localValue`
watch(() => props.value, (newValue) => {
  localValue.value = newValue ?? "";
});

// Dynamic class based on the error state
const inputClass = ref('rounded mt-2 p-2 w-full border border-neutral-800 focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2');

watch(() => props.error, (newValue) => {
  inputClass.value = newValue
      ? 'rounded mt-2 p-2 w-full border border-red-600 focus:outline-none focus:ring-0 focus:border-red-600 focus:border-2'
      : 'rounded mt-2 p-2 w-full border border-neutral-800 focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2';
});

// Emit event to update the parent
const emit = defineEmits(['update:modelValue']);
function updateValue(value) {
  localValue.value = value; // Update local value
  emit('update:modelValue', value); // Emit to parent
}
</script>

<template>
  <div>
    <Label :label="label" />
    <div>
      <input
          @input="updateValue($event.target.value)"
          :value="localValue"
          :class="inputClass"
          type="password"
      />
    </div>
    <div v-if="error">
      <p :class="COLORS.RED">{{ errorMessage }}</p>
    </div>
  </div>
</template>
