<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import LargeTitle from "@/Shared/Typography/LargeTitle.vue";
import {computed} from "vue";
import {defaultOptionalArrayProp} from "@/Shared/Props/common.js";
import Select from "@/Shared/Inputs/Select.vue";
import Form from "@/Pages/ComponentLibrary/utils/Form.vue";
const props = defineProps({
  componentDirectories: defaultOptionalArrayProp([]),
});


</script>

<template>
  <MainLayout>
    <div class="flex justify-center mt-10">
      <div class="w-1/2">
        <LargeTitle title="Document New Vue Component"/>
        <Form :components="componentDirectories" :route-action="route('component-library.store')"/>
      </div>
    </div>
  </MainLayout>

</template>

<style scoped>

</style>