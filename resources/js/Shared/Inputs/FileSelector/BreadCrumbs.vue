<script setup>
import {defaultEmptyOptionalArrayProp, optionalStringProp} from "@/Shared/Props/common.js";
import {COLORS, ICON_SIZES, TEXT_SIZES, WEIGHT} from "@/Shared/Typography/utils/classes.js";
import {ArrowLeftIcon} from "@heroicons/vue/24/outline/index.js";
import {computed, watch} from "vue";

const props = defineProps({
  pathArray: defaultEmptyOptionalArrayProp,
});

const activeTab = () => {
  return props.pathArray[props.pathArray.length - 1];
}

const isActive = (item) => {
  return activeTab() === item;
}

isActive()
watch(() => props.pathArray, activeTab, {deep: true});

</script>

<template>
  <div :class="['flex', COLORS.BLUE, WEIGHT.BOLD, TEXT_SIZES.MD,'bg-neutral-200','p-1']">
    <div :class="[ICON_SIZES.XS.width, ICON_SIZES.XS.height, WEIGHT.BOLD,'mt-1', 'mr-2']">
      <ArrowLeftIcon aria-label="back-arrow"/>
    </div>
    <div class="ml-3">
      <span :class="[COLORS.BLACK,TEXT_SIZES.SM, WEIGHT.LIGHT,{isActive(item): WEIGHT.EXTRA_BOLD}]" v-for="item in pathArray">{{ item }}</span>
    </div>
  </div>

</template>

<style scoped>

</style>