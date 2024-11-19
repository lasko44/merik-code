<script setup>

import {optionalStringProp, requiredStringProp} from "@/Shared/Props/common.js";
import {ref} from "vue";
import axios from 'axios';
import {COLORS} from "@/Shared/Typography/utils/classes.js";
import {BACKGROUND} from "@/Shared/Inputs/utils/classes.js";
import Button from "@/Shared/Inputs/Button.vue";

const props = defineProps({
  routeAction: requiredStringProp,
  payload: optionalStringProp
});

const emit = defineEmits(["update"]);

const loading = ref(false);
const showError = ref(false);
const btnDisabled = ref(true);

function generate() {
    loading.value = true;
    axios.get(props.routeAction, {params: {payload: props.payload}})
        .catch(function (error){
          showError.value = true;
          loading.value = false;
          console.error(error);
        })
        .then( response => {
          let text = response.data
          emit('update', text);
          loading.value = false;
        })
}

</script>

<template>
  <div class="flex w-full justify-between rounded p-2" :class="[COLORS.WHITE, BACKGROUND.BLUE]">
    <p  class="mt-2">This field is AI enabled! Click Generate to fill this field</p>
    <Button @click="generate" :disabled="btnDisabled" :theme="'lite'" text="Generate"/>
  </div>

</template>

<style scoped>

</style>