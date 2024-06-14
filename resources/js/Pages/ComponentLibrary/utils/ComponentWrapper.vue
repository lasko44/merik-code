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
  <div class="w-full">
    <div class="mt-5">
      <slot>
      </slot>
    </div>
    <LargeTitle class="mt-2" :title="title" theme="blue"/>
    <div class="mt-2">
      <SmallParagraph :content="description"/>
    </div>
    <div class="mt-1 block">
      <ForwardArrowLink label="Learn More" size="sm" arrow-theme="blue"/>
    </div>
  </div>
</template>
