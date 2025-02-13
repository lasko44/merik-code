<script setup>

import {optionalStringProp, requiredStringProp} from "@/Shared/Props/common.js";
import {ref, watch} from "vue";
import axios from 'axios';
import {COLORS} from "@/Shared/Typography/utils/classes.js";
import {BeakerIcon, BoltIcon} from "@heroicons/vue/24/outline/index.js";
import Button from "@/Shared/Inputs/Button.vue";

const props = defineProps({
  routeAction: requiredStringProp,
  payload: optionalStringProp
});

watch(() => props.payload, (newValue) =>{
  btnDisabled.value = !newValue;
});

const emit = defineEmits(["update","spinner"]);

const showError = ref(false);
const btnDisabled = ref(true);

function generate() {
  emit('spinner', true);
    axios.get(props.routeAction, {params: {payload: props.payload}})
        .catch(function (error){
          showError.value = true;
          emit('spinner', false);
          console.error(error);
        })
        .then( response => {
          let text = response.data
          emit('update', text);
        })
}

</script>

<template>
<div class="flex w-full justify-between rounded-t p-2 bg-accent dark:bg-drk-accent text-text dark:text-drk-text">
    <p  class="mt-2">This field is AI enabled! Click Generate to fill this field</p>
    <button @click="generate" :disabled="btnDisabled" class="flex justify-between border p-2 disabled:bg-neutral-400 disabled:opacity-25 rounded border-neutral-100 enabled:hover:bg-neutral-400 enabled:hover:bg-opacity-25">
      Generate
      <BoltIcon class="h-6 w-6" :disabled="btnDisabled" />
    </button>

  </div>

</template>

<style scoped>

</style>