<script setup>
import {computed} from "vue";
import "../Props/common.js"
import {actionProp, optionalStringDefaultProp, optionalStringProp} from "@/Shared/Props/common.js";
import types from "@/Shared/Cards/Buttons/utils/types.js";
import componentGenerator from "@/Shared/Cards/Buttons/utils/componentGenerator.js";

const props = defineProps({
  label: optionalStringProp,
  action: actionProp,
  customClass: optionalStringDefaultProp('text-neutral-800'),
});

//TODO this is kinda dumb and specific fix later
const buttonTypeComponent = computed(() => {
  let type = '';
   if(!props.action || props.action?.buttonType.toLowerCase() === types.locked){
     type = types.locked.name;
   }
   if(props.action?.buttonType.toLowerCase() === types.link){
     type = types.link.name
   }
  return componentGenerator(type);
});

</script>

<template>
  <component :is="buttonTypeComponent">
    <div class="flex justify-between">
      <div class="text-sm font-bold mt-0.5 mr-1">
        {{ label }}
      </div>
      <div class="h-6 w-6" :class="['h-6','w-6', customClass]">
        <slot></slot>
      </div>
    </div>
  </component>

</template>
