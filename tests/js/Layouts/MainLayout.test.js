import {describe, it, expect, vi} from "vitest";
import { mount } from "@vue/test-utils";
import MainLayout from "@/Layouts/MainLayout.vue";
import MainNav from "@/Shared/MainNav.vue";

vi.mock('ziggy-js', () => ({
    route: vi.fn((name) => `/route/${name}`),
}));

describe("MainLayout", ()=>{

    it("renders component correctly", ()=> {
        const wrapper = mount(MainLayout);

        expect(wrapper.find("main").exists()).toBe(true)
    });

    it("renders the MainNav component", () => {
        const wrapper = mount(MainLayout);

        // Check if MainNav is rendered
        expect(wrapper.findComponent(MainNav).exists()).toBe(true);
    });

    it("renders slot content", () => {
        const slotContent = "<p>Test Slot Content</p>";
        const wrapper = mount(MainLayout, {
            slots: {
                default: slotContent,
            },
        });

        // Check if the slot content is rendered
        expect(wrapper.html()).toContain(slotContent);
    });
});