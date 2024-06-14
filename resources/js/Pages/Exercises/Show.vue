<script setup>
import Editor from "@/Shared/Editor/Editor.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import TitleCard from "@/Shared/Cards/TitleCard.vue";
import {reactive} from "vue";

defineProps({
  exercise: {
    type: Object,
    required: true
  }
});
 const code = null;
const data = reactive({
  lorem: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum tellus. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque."
});

</script>

<template>
  <MainLayout>
    <div class="flex justify-center">
      <div class="w-1/2">
        <TitleCard :main-title="exercise.name"
                   :sub-title="exercise.language.name"
                   :content="data.lorem"
                   :label="exercise.category.name"></TitleCard>
      </div>
    </div>
    <div class="flex justify-center mt-10">
      <div class="w-1/2">
        <div>
          <h1>JavaScript Code Editor</h1>
          <editor v-model="code" value=""></editor>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
