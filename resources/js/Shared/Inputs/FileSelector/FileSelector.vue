<script setup>

import {defaultFalseBoolProp, defaultOptionalArrayProp, optionalStringDefaultProp} from "@/Shared/Props/common.js";
import {FolderIcon, DocumentIcon, ExclamationCircleIcon} from "@heroicons/vue/24/outline/index.js";
import {COLORS, ICON_SIZES} from "@/Shared/Typography/utils/classes.js";
import {ref} from "vue";
import axios from 'axios';
import BreadCrumbs from "@/Shared/Inputs/FileSelector/BreadCrumbs.vue";
import Spinner from "@/Shared/Indicators/Spinner.vue";
import {isVueFile} from "@/Shared/Inputs/FileSelector/util/FileSelectorUtil.js";
import {route} from "ziggy-js";
import {pathStore} from "@/Pages/ComponentLibrary/Store/index.js";

const store = pathStore();

const props = defineProps({
  label: optionalStringDefaultProp("Select File"),
  options: defaultOptionalArrayProp([]),
  required: defaultFalseBoolProp,
})

const filePath = ref([]);
const loading = ref(false);
const showError = ref(false);
const directories = ref(props.options);
const selectDisabled = ref(true);
const selectedFile = ref(null)
const emit = defineEmits(['update:modelValue']);

function select(option) {
  if (!isVueFile(option.name)) {
    store.updatePath([], null);
    selectDisabled.value = true;
    filePath.value.push(option.name);
    loading.value = true;
    updateDirectories()
    if(selectedFile.value){
      emitValue(null);
    }
  }
  else{
    selectDisabled.value = false;
    selectedFile.value = option.name
    store.updatePath(filePath.value, selectedFile.value);
    emitValue(selectedFile.value);
  }
}

function emitValue(value){
  emit('update:modelValue', value);
}

function updateDirectories(data) {
  if (data) {
    filePath.value = data;
  }
  emitValue(null);

  axios.get(route('directory.index'), {params: {path: filePath.value}})
      .catch(function (error) {
        showError.value = true;
        loading.value = false;
        console.error(error)
      })
      .then(response => {
        directories.value = response.data;
        loading.value = false;
      });
}

const TYPES = {
  dir: "directory",
  file: "file"
}

</script>

<template>
  <div class="border border-neutral-800 rounded bg-neutral-100">
    <div :class="['text-neutral-100', 'p-1.5', 'bg-cyan-700']">
      Select Vue Component <span v-if="required" :class="COLORS.RED">*</span>
    </div>
    <BreadCrumbs :path-array="filePath" @update-path="updateDirectories"/>
    <div id="parent-box" class="p-2">
      <div id="list-container" class="my-2" v-if="!loading && !showError">
        <ul>
          <li v-for="(option, index) in directories" :key="index" class="block my-1">
            <div @click="select(option)" class="flex hover:underline hover:cursor-pointer"
                 :class="{'bg-cyan-700 bg-opacity-20 rounded' : selectedFile === option.name}">
              <div :class="[ICON_SIZES.XS.width, ICON_SIZES.XS.height, 'mt-1', 'mr-1']">
                <FolderIcon v-if="option.type === TYPES.dir "/>
                <DocumentIcon v-if="option.type === TYPES.file"/>
              </div>
              {{ option.name }}
            </div>
          </li>
        </ul>
      </div>
      <div id="loading-box" v-show="loading && !showError" class="flex justify-center align-middle">
        <Spinner class="mt-10"/>
      </div>
      <div v-if="showError" class="flex justify-center text-neutral-400 py-10">
        <p>Error Retrieving Directories</p>
        <div :class="[ICON_SIZES.SM.height, ICON_SIZES.SM.width, COLORS.RED, 'ml-1']">
          <ExclamationCircleIcon/>
        </div>
      </div>
    </div>
  </div>
</template>