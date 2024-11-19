import {defineStore} from "pinia";
import {ref} from "vue";
import actions from "@/Pages/ComponentLibrary/Store/actions.js";

export const pathStore = defineStore('path', {
    state: () => ({
        pathArr: ref([]),
        path: ref(null),
    }),
    actions
});