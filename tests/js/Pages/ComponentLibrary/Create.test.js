import { describe, it, expect } from "vitest";
import { shallowMount } from "@vue/test-utils";
import Create from "@/Pages/ComponentLibrary/Create.vue";
import {Head} from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";

describe("Create", () => {
    it("renders Head Component", () => {
        const wrapper = shallowMount(Create);
        expect(wrapper.findComponent(Head).exists()).toBe(true);
    });

    it("renders MainLayout Component", function () {
        const wrapper = shallowMount(Create);
        expect(wrapper.findComponent(MainLayout).exists()).toBe(true);
    });
});