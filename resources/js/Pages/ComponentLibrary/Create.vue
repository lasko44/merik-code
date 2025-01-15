<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import LargeTitle from "@/Shared/Typography/LargeTitle.vue";
import {computed} from "vue";
import { Head } from '@inertiajs/vue3'
import {defaultOptionalArrayProp} from "@/Shared/Props/common.js";
import Form from "@/Pages/ComponentLibrary/utils/Form.vue";
import {route} from "ziggy-js";
const props = defineProps({
  componentDirectories: defaultOptionalArrayProp([]),
});


</script>

<template>
  <Head>
    <title>Register Component</title>
    <meta name="description" content="Register Component">
  </Head>
  <MainLayout>
    <div class="flex justify-center">
      <div class="w-1/2 mt-10">
        <LargeTitle title="Document New Vue Component"/>
        <Form :components="componentDirectories" :route-action="route('component-library.store')"/>
      </div>
    </div>
  </MainLayout>

</template>

<style scoped>

</style>