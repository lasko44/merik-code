<script setup>

import {defaultOptionalArrayProp, requiredProp, requiredStringProp} from "@/Shared/Props/common.js";
import FileSelector from "@/Shared/Inputs/FileSelector/FileSelector.vue";
import Button from "@/Shared/Inputs/Button.vue";
import {computed, ref} from "vue";
import {useForm} from "@inertiajs/vue3";
import Text from "@/Shared/Inputs/Text.vue";
import TextArea from "@/Shared/Inputs/TextArea/TextArea.vue";
import {route} from "ziggy-js";
import {pathStore} from "@/Pages/ComponentLibrary/Store/index.js";

const store = pathStore();
const props = defineProps({
  routeAction: requiredStringProp,
  components: defaultOptionalArrayProp([]),
});

const aiRoute = route('gemini-document.index');

const form = useForm({
  path: null,
  name: null,
  description: null
});

const formDisabled = computed(()=> {
  return !(form.path !== null && form.name !== null && form.description !== null);
});

function setName(value){
  form.name = value;
  form.path = store.path;
}

function submit() {
  form.post(route('component-library.store'));
}

</script>

<template>
  <FileSelector :options="components" @update:model-value="setName" :required="true"/>
  <Text :required="true" label="Component Name"  class="mt-3" :read-only="true" :value="form.name"/>
  <TextArea class="mt-3" label="Component Documentation" v-model="form.description" :payload="store.path" :required="true" :enable-ai="true" :ai-route="aiRoute" :rows="12"/>
  <div class="flex justify-end">
    <Button class="my-3" @click="submit" :disabled="formDisabled" :text="'Submit'"/>
  </div>
</template>
