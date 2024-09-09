<script setup>

import {defaultOptionalArrayProp, requiredProp, requiredStringProp} from "@/Shared/Props/common.js";
import FileSelector from "@/Shared/Inputs/FileSelector/FileSelector.vue";
import Button from "@/Shared/Inputs/Button.vue";
import {ref} from "vue";
import {useForm} from "@inertiajs/vue3";
import Text from "@/Shared/Inputs/Text.vue";

const props = defineProps({
  routeAction: requiredStringProp,
  components: defaultOptionalArrayProp([]),
});

const form = useForm({
  path: null,
  name: null,
  description: null
});

const formDisabled = ref(true);

</script>

<template>
  <FileSelector :options="components" :required="true"/>
  <Text :required="true" label="Component Name" :value="form.name"/>
  <div class="flex justify-end">
    <Button class="my-3" :disabled="formDisabled" :text="'Submit'"/>
  </div>
</template>

<style scoped>

</style>