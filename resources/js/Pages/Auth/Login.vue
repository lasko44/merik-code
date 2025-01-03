<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import StandardCard from "@/Shared/Cards/StandardCard.vue";
import {Head, useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import Text from "@/Shared/Inputs/Text.vue";
import Button from "@/Shared/Inputs/Button.vue";
import Password from "@/Shared/Inputs/Password.vue";
import Checkbox from "@/Shared/Inputs/Checkbox.vue";

const form = useForm({
  username: ref(null),
  password: ref(null),
  rememberMe: ref(false),
});
</script>

<template>
  <Head>
    <title>Login</title>
    <meta name="description" content="Login to Merik Code">
  </Head>
  <MainLayout>
    <div class="flex justify-center mt-20">
      <StandardCard class="w-1/2" :title="'Login'">
        <section class="flex justify-center mt-6">
          <div class="w-3/4">
            <Text label="Username" v-model="form.username"/>
            <Password class="mt-3" label="Password" v-model="form.password"/>
            <Checkbox class="mt-3" label="Remember Me" v-model="form.rememberMe"/>
            <Button :disabled="false" class="w-full mt-10" text="Login"/>
          </div>
        </section>
      </StandardCard>
    </div>
  </MainLayout>
</template>

<style scoped>

</style>