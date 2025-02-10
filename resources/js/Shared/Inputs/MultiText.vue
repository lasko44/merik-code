<script setup>
import Label from "@/Shared/Inputs/Label.vue";
import {defaultEmptyOptionalArrayProp, requiredStringProp} from "@/Shared/Props/common.js";
import {XMarkIcon, PlusIcon} from "@heroicons/vue/24/outline/index.js";
import {ref, watch} from "vue";

const props = defineProps({
  label: requiredStringProp,
  inferredProps: defaultEmptyOptionalArrayProp
});

watch(
    () => props.inferredProps,
    (newProps) => {
      if (newProps) {
        componentProps.value = newProps.map(prop => ({ name: prop }));
        if(!componentProps.value.length){
          componentProps.value.push({name: ""});
        }
      }
    }
);

const componentProps = ref( props.inferredProps.length ? props.inferredProps : [
  {
    name: ""
  }
])

function addProp() {
  componentProps.value.push({name: ""});
}

function removeProp(index) {
  componentProps.value.splice(index, 1);
  if (componentProps.value.length === 0) {
    componentProps.value = [{name: ""}];
  }
}

</script>

<template>
  <div>
    <Label :label="label"/>
    <div class="flex justify-between items-center" v-for="(prop, index) in componentProps" :key="index">
      <input
          v-model="prop.name"
          type="text"
          class="rounded border-none mt-2 p-2 flex-grow shadow-md shadow-neutral-400 focus:outline-none focus:ring-0
          focus:border-cyan-600 focus:border-2"
      />
      <div class="w-8 flex justify-center items-center">
        <button
            aria-label="add prop"
            :disabled="!(prop.name !== '' || index > 0)"
            @click="removeProp(index)"
            class="h-6 w-6 text-neutral-900 disabled:text-opacity-20 enabled:hover:font-bold"
        >
          <XMarkIcon/>
        </button>
      </div>
    </div>
    <div>
      <button
          @click="addProp"
          aria-label="add prop"
          class="h-6 w-6 mt-2 p-1 rounded text-cyan-700 border border-cyan-700 hover:bg-cyan-700 hover:bg-opacity-25"
      >
        <PlusIcon/>
      </button>
    </div>
  </div>
</template>


<style scoped>

</style>