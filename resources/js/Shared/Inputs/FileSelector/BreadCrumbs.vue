<script setup>
import {defaultEmptyOptionalArrayProp, optionalStringProp} from "@/Shared/Props/common.js";
import {COLORS, ICON_SIZES, TEXT_SIZES, WEIGHT} from "@/Shared/Typography/utils/classes.js";
import {ArrowLeftIcon} from "@heroicons/vue/24/outline/index.js";
import {computed, ref, watch} from "vue";

const props = defineProps({
  pathArray: defaultEmptyOptionalArrayProp,
});

const emit = defineEmits(['update-path']);
const home = "Home/"
const path = ref(props.pathArray)

const activeTab = () => {
  const active = props.pathArray[props.pathArray.length - 1];
  return active ? active : "Home/";
};

const back = () => {
  path.value.pop()
  emit('update-path', path.value)
}

const crumb = (item) => {
  const index = path.value.indexOf(item);

  if (index === -1) {
    if (item === home) {
      emit('update-path', []);
    } else {
      emit('update-path', path.value);
    }
    return;
  }

  const newPath = path.value.slice(0, index + 1);
  emit('update-path', newPath);
};


const pathClasses = (item) => {
  return [
    'hover:underline',
    'ml-0.5',
    'hover:cursor-pointer',
    TEXT_SIZES.SM,
    {'font-light text-neutral-800 ': activeTab() !== item},
    {'font-bold text-cyan-700': activeTab() === item},
  ];
}


const isActive = (item) => {
  return activeTab() === item;
}


watch(() => props.pathArray, activeTab, {deep: true});

</script>

<template>
  <div :class="['flex', COLORS.BLUE, WEIGHT.BOLD, TEXT_SIZES.MD,'bg-neutral-200','p-1']">
    <div @click="back" id="bread-back-arrow" :class="[ICON_SIZES.XS.width, ICON_SIZES.XS.height,'mt-1', 'mr-2','hover:cursor-pointer']">
      <ArrowLeftIcon class="hover:stroke-2 " aria-label="back-arrow"/>
    </div>
    <div class="ml-3">
      <span :class="pathClasses(home)" id="home-item" @click="crumb(home)">{{ home }}</span>
      <span :class="pathClasses(item)" @click="crumb(item)" :id="`crumb-${index}`" v-for="(item, index) in pathArray">{{ item }}</span>
    </div>
  </div>

</template>

<style scoped>

</style>