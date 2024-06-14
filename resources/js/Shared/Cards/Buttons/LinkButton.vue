<script setup>
import {Link} from "@inertiajs/vue3";
import {defaultEmptyOptionalArrayProp, requiredStringProp} from "@/Shared/Props/common.js";
import classGenerator from "@/Shared/Utils/classGenerator.js";
import {ROUNDED_P1} from "@/Shared/Cards/Buttons/utils/classes.js";

const props = defineProps({
  customClasses: defaultEmptyOptionalArrayProp,
  route: requiredStringProp,
});

const buttonClasses = classGenerator(props.customClasses, ROUNDED_P1);

</script>

<template>
  <Link :href="route(route)">
    <div :class="buttonClasses">
      <slot></slot>
    </div>
  </Link>
</template>
