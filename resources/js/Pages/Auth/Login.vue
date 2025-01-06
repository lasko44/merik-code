<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import StandardCard from "@/Shared/Cards/StandardCard.vue";
import {Head, useForm} from "@inertiajs/vue3";
import Text from "@/Shared/Inputs/Text.vue";
import Button from "@/Shared/Inputs/Button.vue";
import Password from "@/Shared/Inputs/Password.vue";
import Checkbox from "@/Shared/Inputs/Checkbox.vue";
import {route} from "ziggy-js";

const form = useForm({
  username: "",
  password: "",
  remember: false,
});

function submit() {
  const loginRoute = route('login.store');
  form.post(loginRoute);
}

</script>

<template>
  <Head>
    <title>Login</title>
    <meta name="description" content="Login to Merik Code">
  </Head>
  <MainLayout>
    <div class="flex justify-center mt-[-60px] mb-[-60px]">
      <img src="images/avatar.png" class="logo1" alt="merik-logo">
    </div>
    <div class="flex justify-center">
      <StandardCard class="w-1/2" :title="'Login'">
        <section class="flex justify-center mt-6">
          <div class="w-3/4">
            <Text label="Username" v-model="form.username"/>
            <Password class="mt-3" label="Password" v-model="form.password"/>
            <Checkbox class="mt-3" label="Remember Me" v-model="form.remember"/>
            <Button :disabled="false" @click="submit" class="w-full mt-10" text="Login"/>
          </div>
        </section>
      </StandardCard>
    </div>
  </MainLayout>
</template>

<style scoped>
.logo1 {
  mix-blend-mode:multiply;
}
</style>