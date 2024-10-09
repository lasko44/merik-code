<script setup>

import {defaultOptionalArrayProp, requiredProp, requiredStringProp} from "@/Shared/Props/common.js";
import FileSelector from "@/Shared/Inputs/FileSelector/FileSelector.vue";
import Button from "@/Shared/Inputs/Button.vue";
import {ref} from "vue";
import {useForm} from "@inertiajs/vue3";
import Text from "@/Shared/Inputs/Text.vue";
import TextArea from "@/Shared/Inputs/TextArea/TextArea.vue";

const props = defineProps({
  routeAction: requiredStringProp,
  components: defaultOptionalArrayProp([]),
});

const form = useForm({
  path: null,
  name: null,
  description: null
});

function setName(value){
  form.name = value;
}

const formDisabled = ref(true);

</script>

<template>
  <FileSelector :options="components" @update:model-value="setName" :required="true"/>
  <Text :required="true" label="Component Name"  class="mt-3" :read-only="true" :value="form.name"/>
  <TextArea class="mt-3" label="Component Documentation"  :required="true" :enable-ai="true" rows="12"/>
  <div class="flex justify-end">
    <Button class="my-3" :disabled="formDisabled" :text="'Submit'"/>
  </div>
</template>
