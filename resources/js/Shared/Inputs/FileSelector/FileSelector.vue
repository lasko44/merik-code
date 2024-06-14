<script setup>

import {defaultFalseBoolProp, defaultOptionalArrayProp, optionalStringDefaultProp} from "@/Shared/Props/common.js";
import {FolderIcon, DocumentIcon, ExclamationCircleIcon} from "@heroicons/vue/24/outline/index.js";
import {COLORS, ICON_SIZES} from "@/Shared/Typography/utils/classes.js";
import {BACKGROUND} from "@/Shared/Inputs/utils/classes.js";
import {onBeforeUnmount, onMounted, ref} from "vue";
import BreadCrumbs from "@/Shared/Inputs/FileSelector/BreadCrumbs.vue";
import Spinner from "@/Shared/Indicators/Spinner.vue";
import {computedBoxSize} from "@/Shared/Utils/computedStylesHelper.js";

const props = defineProps({
  label: optionalStringDefaultProp("Select File"),
  options: defaultOptionalArrayProp([]),
  required: defaultFalseBoolProp,
})

const activeItem = ref(null);
const filePath = ref([]);
const loading = ref(false);
const boxSize = ref({});
const showError = ref(false);
const directories = ref(props.options);

function getBoxSize () {
  let box = document.getElementById("list-container");

  return {
    height: box.offsetHeight,
    width: box.offsetWidth
  };
}

function updateSize() {
  let parentBox = document.getElementById("parent-box");
  let computedSize = computedBoxSize(parentBox)
  boxSize.value.width = computedSize.width
}

function setBoxSize () {
  updateSize();
  let box = document.getElementById("loading-box");
  box.setAttribute("style",`height: ${boxSize.value.height}px; width: ${boxSize.value.width}px`);
}

function select(option) {
  boxSize.value = getBoxSize();
  filePath.value.push(option.name);
  loading.value = true;
  setBoxSize();
  updateDirectories()
}

function updateDirectories(){
  axios.get(route('directory.index'), {params: {path: filePath.value}})
      .catch(function (error){
        showError.value = true;
        loading.value = false;
        console.error(error)
      })
      .then(response => {
        directories.value = response.data;
        loading.value = false;
      });
}

onMounted(() => {
  window.addEventListener('resize', setBoxSize);
  boxSize.value = getBoxSize();
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', setBoxSize);
});

const TYPES = {
  dir: "directory",
  file: "file"
}

</script>

<template>
  <div class="border border-neutral-800 rounded" >
    <div  :class="['text-neutral-100', 'p-1.5', BACKGROUND.BLUE]">
      Select File <span v-if="required" :class="COLORS.RED">*</span>
    </div>
    <div v-if="filePath.length">
      <BreadCrumbs :path-array="filePath"/>
    </div>
    <div id="parent-box" class="p-2">
      <div id="list-container" v-if="!loading && !showError">
        <ul>
          <li v-for="(option, index) in directories" :key="index" class="block my-1">
            <div @click="select(option)" class="flex hover:underline hover:cursor-pointer">
              <div  :class="[ICON_SIZES.XS.width, ICON_SIZES.XS.height, 'mt-1', 'mr-1']">
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

<style scoped>

</style>