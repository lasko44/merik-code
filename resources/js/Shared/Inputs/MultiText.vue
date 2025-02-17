<script setup>
import Label from "@/Shared/Inputs/Label.vue";
import {defaultEmptyOptionalArrayProp, requiredStringProp} from "@/Shared/Props/common.js";
import {XMarkIcon, PlusIcon} from "@heroicons/vue/24/outline/index.js";
import {ref, watch} from "vue";

const props = defineProps({
  label: requiredStringProp,
  inferredProps: defaultEmptyOptionalArrayProp
});

const emit = defineEmits(['update:modelValue']);

watch(
    () => props.inferredProps,
    (newProps) => {
      if (newProps) {
        componentProps.value = newProps.map(prop => ({ name: prop.name, type: prop.type, value: prop.value, required: prop.required }));
        emit("update:modelValue", componentProps.value)
        if(!componentProps.value.length){
          componentProps.value.push({name: ""});
        }
      }
    }
);

const componentProps = ref( props.inferredProps.length ? props.inferredProps : [
  {
    name: "",
    type: "",
    value: "",
    required: false
  }
])

function addProp() {
  componentProps.value.push({name: "", type: "", value: "", required: false});
}

function updateValue(){
  emit("update:modelValue", componentProps.value)
}
function removeProp(index) {
  componentProps.value.splice(index, 1);
  if (componentProps.value.length === 0) {
    componentProps.value = [{name: "", type: "", value: "", required: false}];
  }
  updateValue();
}

</script>

  <template>
    <div>
      <Label :label="label"/>
      <div class="flex justify-between items-center">
        <div class="w-full">
          <div class=" w-full flex justify-between items-center mt-2">
            <span class="w-full">Prop Name</span>
            <span class="w-full">Prop Type</span>
            <span class="w-full">Prop Required</span>
            <span class="w-full">Prop Value</span>
          </div>
          <div class="flex justify-between items-center" v-for="(prop, index) in componentProps" :key="index">
            <input
              v-model="prop.name"
              type="text"
              @input="updateValue"
              class="rounded border-none mt-2 p-2 w-full shadow-md dark:shadow-md text-text dark:bg-primary/10 dark:text-drk-text focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2"
              placeholder="Prop Name"
            />
            <p class="w-full p-2">{{ prop.type || ' ' }}</p>
           <p :class="['w-full p-2 ml-1 hover:cursor-pointer', { 'opacity-50': !prop.required }]" @click="prop.required = !prop.required">{{ prop.required ? 'Yes' : 'No' }}</p>
            <input
              v-model="prop.value"
              type="text"
              @input="updateValue"
              class="rounded border-none mt-2 p-2 w-full shadow-md dark:shadow-md text-text dark:bg-primary/10 dark:text-drk-text focus:outline-none focus:ring-0 focus:border-cyan-600 focus:border-2"
              placeholder="Prop Value"
            />
            <div class="w-8 flex justify-center items-center">
              <button
                aria-label="add prop"
                :disabled="!(prop.name !== '' || index > 0)"
                @click="removeProp(index)"
                class="h-6 w-6 text-text dark:text-drk-text disabled:text-opacity-20 enabled:hover:font-bold"
              >
                <XMarkIcon/>
              </button>
            </div>
          </div>
          <div>
            <button
              @click="addProp"
              aria-label="add prop"
              class="h-6 w-6 mt-2 p-1 rounded text-accent border border-accent hover:bg-accent hover:bg-opacity-25"
            >
              <PlusIcon/>
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>


