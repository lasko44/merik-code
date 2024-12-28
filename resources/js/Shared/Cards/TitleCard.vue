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
  <section class="border text-neutral-800 shadow-lg border-neutral-800  bg-neutral-100 p-4 rounded">
    <header class="flex justify-between border-b-2 border-cyan-700">
      <h3 class="font-semibold" id="title-card-title">
        {{ mainTitle }} <span id="title-card-sub-title" v-if="subTitle">- {{ subTitle }}</span>
      </h3>
      <h3 id="title-card-label" class="font-bold" v-if="label">
        {{ label }}
      </h3>
    </header>
    <p id="title-card-content" class="mt-3">
      {{ content }}
    </p>
    <footer class="flex justify-end mt-5">
      <component :is="components.lessonStatus" v-if="showAction"></component>
    </footer>
  </section>
</template>
