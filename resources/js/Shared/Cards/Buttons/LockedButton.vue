<script setup>

import {DEFAULT_POINTER_P1} from "@/Shared/Cards/Buttons/utils/classes.js";
import {defaultEmptyOptionalArrayProp} from "@/Shared/Props/common.js";
import classGenerator from "@/Shared/Utils/classGenerator.js";

const props = defineProps({
  customClasses: defaultEmptyOptionalArrayProp
});

const buttonClasses = classGenerator(props.customClasses, DEFAULT_POINTER_P1);

</script>

<template>
  <div :class="buttonClasses">
    <slot></slot>
  </div>
</template>