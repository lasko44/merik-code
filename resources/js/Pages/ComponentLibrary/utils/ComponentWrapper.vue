<script setup>
import {requiredStringProp} from "@/Shared/Props/common.js";
import SmallParagraph from "@/Shared/Typography/SmallParagraph.vue";
import LargeTitle from "@/Shared/Typography/LargeTitle.vue";
import ForwardArrowLink from "@/Shared/Indicators/ForwardArrowLink.vue";

defineProps({
  title: requiredStringProp,
  description: requiredStringProp
});
</script>

<template>
  <div class="w-full mt-5">
    <section class="text-text shadow-md dark:shadow-none dark:text-drk-text bg-background dark:bg-primary dark:bg-opacity-20 dar p-4 rounded dark">
      <LargeTitle class="text-3xl font-bold" :title="title"/>
      <div class="mt-2">
        <SmallParagraph class="text-text dark:text-drk-text" :content="description"/>
      </div>
    </section>
    <div class="mt-5">
      <slot>
      </slot>
    </div>
  </div>
</template>
