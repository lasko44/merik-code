<script setup>
import {useForm, usePage} from "@inertiajs/vue3";
import { computed, ref } from "vue";
import clickOutside from "@/Directives/clickOutside.js";
import {route} from "ziggy-js";
import {COLORS} from "@/Shared/Typography/utils/classes.js";
import {optionalProp} from "@/Shared/Props/common.js";

const props = defineProps({user: optionalProp})

const page = usePage();
const user = computed(() => page.props?.auth?.user ?? props.user);
const hidden = ref(true);
const vClickOutside = clickOutside;
const form = useForm({});
const closeDropdown = () => {
  hidden.value = true; // Close the dropdown
};

const toggleDropdown = (event) => {
  event.stopPropagation(); // Prevent click event from propagating
  hidden.value = !hidden.value; // Toggle dropdown visibility
};

function logout(){
  form.post(route('logout'));
}

</script>

<template>
  <div class="h-10 w-10" v-if="user">
    <img
        :src="user.profile_photo_path"
        id="dropdownLink"
        data-dropdown-toggle="dropdownMenu"
        @click="toggleDropdown"
        class="hover:cursor-pointer rounded-full hover:border-2 border-cyan-700"
        :alt="user.name"
    >
    <div
        v-click-outside="closeDropdown"
        id="dropdownMenu"
        :class="[
        'z-60',
        'relative',
        'right-[156px]',
        'bg-white',
        'divide-y',
        'rounded-lg',
        'border',
        'border-neutral-900',
        'shadow',
        'w-44',
        { hidden: hidden }
      ]"
    >
      <ul class="py-2 text-sm text-neutral-900" aria-labelledby="dropdownLargeButton">
        <li>
          <a :href="route('component-library.create')" class="block px-4 py-2 hover:bg-cyan-700 hover:bg-opacity-20">Dashboard</a>
        </li>
        <li>
          <a href="#" class="block px-4 py-2 hover:bg-cyan-700 hover:bg-opacity-20">Settings</a>
        </li>
        <li>
          <a href="#" class="block px-4 py-2 hover:bg-cyan-700 hover:bg-opacity-20">Earnings</a>
        </li>
      </ul>
      <div class="py-1">
        <a @click="logout"
           class="block px-4 py-2 text-sm text-neutral-900 hover:cursor-pointer hover:underline">
          Sign out
        </a>
      </div>
    </div>
  </div>
  <div v-else :class="[COLORS.WHITE, 'hover:underline', 'hover:underline-neutral-']">
    <a :href="route('login')"> Login </a>
  </div>
</template>
