<script setup>
import TitleCard from "@/Shared/Cards/TitleCard.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import {titleCardContent} from "@/Pages/ComponentLibrary/utils/demoContent.js";
import ComponentWrapper from "@/Pages/ComponentLibrary/utils/ComponentWrapper.vue";
import {descriptions} from "@/Pages/ComponentLibrary/utils/descriptions.js";

const props = defineProps({
  components:{
    type: Object,
    required: false,
    default: {},
  }
});

</script>

<template>
  <main-layout>
    <div class="flex mt-10 justify-center">
      <div class="w-1/2">
        <component-wrapper title="TitleCard" :description="descriptions.titleCard">
          <title-card main-title="Main Title" sub-title="Subtitle" label="Label" :content="titleCardContent"></title-card>
        </component-wrapper>
      </div>
    </div>
  </main-layout>

</template>

<style scoped>

</style>