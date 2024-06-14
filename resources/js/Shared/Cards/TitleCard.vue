<script setup>
import LessonStatusIndicator from "@/Shared/Indicators/LessonStatusIndicator.vue";
import "../Props/common.js"
import {actionProp, defaultFalseBoolProp, requiredStringProp} from "@/Shared/Props/common.js";

defineProps({
  mainTitle: requiredStringProp,
  subTitle: requiredStringProp,
  label: requiredStringProp,
  content: requiredStringProp,
  showAction: defaultFalseBoolProp,
  action: actionProp,
});

const components = {
  lessonStatus: LessonStatusIndicator
}
</script>

<template>
  <div class="border text-neutral-800 shadow-lg border-neutral-800  bg-neutral-100 p-4 rounded">
    <div class="flex justify-between border-b-2 border-cyan-700">
      <div class="font-semibold">
        {{ mainTitle }} <span v-if="subTitle">- {{ subTitle }}</span>
      </div>
      <div class="font-bold" v-if="label">
        {{ label }}
      </div>
    </div>
    <div class="mt-3">
      {{ content }}
    </div>
    <div class="flex justify-end mt-5">
      <component :is="components.lessonStatus" v-if="showAction"></component>
    </div>
  </div>
</template>

<style scoped>

</style>