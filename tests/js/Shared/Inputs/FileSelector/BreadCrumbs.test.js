import {mount} from "@vue/test-utils";
import BreadCrumbs from "@/Shared/Inputs/FileSelector/BreadCrumbs.vue";
import {expect, test} from "vitest";

const HOME = "Home/";
const ACTIVE_CLASSES = ["font-bold", "text-cyan-700"];
const PATH_ARRAY = ["Test/", "Dir/", "index.vue"];

test("Active tab should be home", () => {
    const wrapper = mount(BreadCrumbs);
    const result = wrapper.find("#home-item");
    const activeTab = wrapper.vm.activeTab();

    expect(activeTab).toBe(HOME);
    expect(result.text()).toBe(HOME);

    const hasClasses = hasActiveClasses(result.classes());
    expect(hasClasses).toBeTruthy();
})

test("Test active with path prop given", () => {
    const wrapper = mount(BreadCrumbs,{
        props:{
            pathArray: PATH_ARRAY,
        }
    });

    const expectedText = "index.vue";
    const expectedId = "#crumb-2"
    const activeTab = wrapper.vm.activeTab();

    const result = wrapper.find(expectedId);
    const hasClasses = hasActiveClasses(result.classes());

    expect(result.text()).toBe(expectedText);
    expect(activeTab).toBe(expectedText);
    expect(hasClasses).toBeTruthy();
});

test("Change active tab with back arrow", () => {
    const wrapper = mount(BreadCrumbs, {
        props: {
            pathArray: PATH_ARRAY,
        }
    });

    const expectedActiveText = "Dir/";
    const expectedActiveId = "#crumb-1";
    const backArrow = wrapper.find("#bread-back-arrow");
    const activeTabClasses = wrapper.find(expectedActiveId).classes();

    backArrow.trigger('click');
    const expectedActiveTextIsActive = wrapper.vm.isActive(expectedActiveText);

    expect(wrapper.emitted()).toHaveProperty("update-path");
    expect(wrapper.vm.activeTab()).toBe(expectedActiveText);
    expect(hasActiveClasses(activeTabClasses)).toBeTruthy();
    expect(expectedActiveTextIsActive).toBeTruthy();
});

test("Home item clears empties path", () => {
    const wrapper = mount(BreadCrumbs, {
        props: {
            pathArray: PATH_ARRAY,
        }
    });

    const homeItem = wrapper.find("#home-item");
    homeItem.trigger("click");

    expect(wrapper.emitted()).toHaveProperty("update-path");
    expect(wrapper.emitted('update-path')[0][0]).toEqual([]);
});

test("crumb select updates path", () => {
    const wrapper = mount(BreadCrumbs, {
        props: {
            pathArray: PATH_ARRAY,
        }
    });

    const expectedPathArray = ["Test/", "Dir/"];
    const crumb = wrapper.find("#crumb-1");
    crumb.trigger("click");

    expect(wrapper.emitted()).toHaveProperty("update-path");
    expect(wrapper.emitted("update-path")[0][0]).toEqual(expectedPathArray);


});
function hasActiveClasses(resultClasses) {
    ACTIVE_CLASSES.forEach((item) => {
        if(!resultClasses.includes(item)){
            return false;
        }
    });
    return true;
}