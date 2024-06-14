<script setup>

import {
  optionalStringDefaultProp,
  optionalStringProp,
  themeColorProp
} from "@/Shared/Props/common.js";
import classKeyGenerator from "@/Shared/Utils/classKeyGenerator.js";
import {ArrowRightCircleIcon} from "@heroicons/vue/24/outline/index.js";
import {LargeIcon, MediumIcon, SmallIcon} from "@/Shared/Typography/utils/classes.js";
import {computed} from "vue";
import {Link} from '@inertiajs/vue3';

const props = defineProps({
  label: optionalStringDefaultProp("Continue"),
  link: optionalStringProp,
  arrowTheme: themeColorProp,
  textTheme: themeColorProp,
  size: optionalStringProp
});

const params = {
  iconSize: props.size,
  iconTheme: props.arrowTheme,
  textTheme: props.textTheme,
};
const keys = classKeyGenerator(params);



const arrowClasses = computed(() => {
  switch (keys.iconSize){
    case 'sm':
      return SmallIcon(keys.iconTheme);
    case 'md':
      return MediumIcon(keys.iconTheme);
    case 'lg':
      return LargeIcon(keys.iconTheme);
    default:
      throw new Error('Cannot find correct Arrow Class');
  }
});

// const labelClasses = computed( () => {
//   switch (keys.textTheme){
//     cas
//   }
// });



</script>

<template>
  <div class="inline-block">
    <Link :href="link ? route(link) : '#'" class=" hover:underline">
      <div class="flex justify-start">
        <div class="font-bold mt-0.5 mr-1">
          {{ label }}
        </div>
        <div :class="arrowClasses">
          <ArrowRightCircleIcon class="mt-0.5"/>
        </div>
      </div>
    </Link>
  </div>
</template>

<style scoped>

</style>