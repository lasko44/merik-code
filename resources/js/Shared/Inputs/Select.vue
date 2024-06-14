<script setup>
import { defaultFalseBoolProp, defaultOptionalArrayProp, optionalStringDefaultProp } from "@/Shared/Props/common.js";
import Text from "@/Shared/Inputs/Text.vue";
import Label from "@/Shared/Inputs/Label.vue";
import { computed, ref } from "vue";
import { vOut } from "@/Shared/Utils/directives/clickOutsideDirective.js";

const props = defineProps({
  label: optionalStringDefaultProp("Select Option"),
  options: defaultOptionalArrayProp([]),
  required: defaultFalseBoolProp,
  placeholder: optionalStringDefaultProp("Start Typing to Search")
});

const textInput = ref("");
const showDropdown = ref(false);

const hideDropdown = () => {
  showDropdown.value = false;
  if(inOptions.value === false){
    textInput.value = "";
  }
};

const updateValue = (value) => {
  textInput.value = value;
  showDropdown.value = false;
};

const searchOptions = computed(() => {
  if (!textInput.value) {
    return props.options;
  }
  return props.options.filter((option) =>
      option.toLowerCase().includes(textInput.value.toLowerCase())
  );
});

const inOptions = computed(() =>{
  return searchOptions.value.includes(textInput.value);
})


const notFound = computed(() => {
  if(((textInput.value || textInput.value !== "") && !searchOptions.value.length )){
    return {
      error: true,
      placeholder: "Could not find what you are looking for",
    }
  }
  else {
    return {
      error: false
    }
  }
});
</script>

<template>
  <Label :label="label" :required="required" />
  <div v-out="hideDropdown">
    <div>
      <Text
          @click="showDropdown = true"
          @input="textInput = $event.target.value"
          :placeholder="notFound?.placeholder ?? placeholder "
          :value="textInput"
          :error="notFound.error"
      />
    </div>
    <div v-if="showDropdown && searchOptions.length" class="bg-white rounded h-20 overflow-y-auto border">
      <ul class="p-2">
        <li
            v-for="option in searchOptions"
            :key="option"
            class="p-0.5 border-b cursor-pointer hover:bg-cyan-600 hover:bg-opacity-20"
            @click="updateValue(option)"
        >
          {{ option }}
        </li>
      </ul>
    </div>
  </div>
</template>


<style scoped>

</style>