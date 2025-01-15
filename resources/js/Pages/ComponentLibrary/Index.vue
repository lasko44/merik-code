<script setup>
import TitleCard from "@/Shared/Cards/TitleCard.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import ComponentWrapper from "@/Pages/ComponentLibrary/utils/ComponentWrapper.vue";

const props = defineProps({
  components:{
    type: Object,
    required: false,
    default: {},
  }
});

const titleCardContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut " +
    "labore et dolore magna aliqua. Parturient montes nascetur ridiculus mus mauris vitae ultricies leo. Amet mattis " +
    "vulputate enim nulla aliquet porttitor lacus."

const titleCard = "This component displays a content box with a main title, " +
    "optional subtitle, and label. It also includes an optional action status indicator (LessonStatusIndicator) " +
    "displayed at the bottom right corner. The component accepts several props to customize the main title, subtitle, " +
    "label, content, and whether to show the action status indicator."

</script>

<template>
  <main-layout>
    <div class="flex mt-10 justify-center">
      <div class="w-1/2">
        <component-wrapper title="TitleCard" :description="titleCard">
          <TitleCard main-title="Main Title" sub-title="Subtitle" label="Label" :content="titleCardContent"/>
        </component-wrapper>
      </div>
    </div>
  </main-layout>

</template>

<style scoped>

</style>