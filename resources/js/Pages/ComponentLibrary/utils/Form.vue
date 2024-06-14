<script setup>

import {defaultOptionalArrayProp, requiredProp, requiredStringProp} from "@/Shared/Props/common.js";
import Select from "@/Shared/Inputs/Select.vue";
import FileSelector from "@/Shared/Inputs/FileSelector/FileSelector.vue";

const props = defineProps({
  routeAction: requiredStringProp,
  components: defaultOptionalArrayProp([]),
});

</script>

<template>
  <FileSelector :options="components" :required="true"/>
</template>

<style scoped>

</style>