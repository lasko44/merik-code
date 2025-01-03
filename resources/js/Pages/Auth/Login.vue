<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import StandardCard from "@/Shared/Cards/StandardCard.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {ref} from "vue";

const form = useForm({
  username: ref(null),
  password: ref(null),
});
</script>

<template>
  <Head>
    <title>Login</title>
    <meta name="description" content="Login to Merik Code">
  </Head>
  <MainLayout>
    <div class="flex justify-center mt-10">
      <StandardCard class="w-1/2" :title="'Login'">

      </StandardCard>
    </div>
  </MainLayout>
</template>

<style scoped>

</style>