import {mount} from "@vue/test-utils";
import LargeTitle from "@/Shared/Typography/LargeTitle.vue";
import {COLORS, TEXT_SIZES, WEIGHT} from "@/Shared/Typography/utils/classes.js";
import {expect, test} from "vitest";

test('basic large title test', () => {
    const title = "Test Title";
    const color =  COLORS.GREEN;
    const size = TEXT_SIZES.LG;
    const weight = WEIGHT.BOLD;

    const wrapper = mount(LargeTitle, {
        props: {
            title: title,
            theme: 'green'
        }
    });

    const titleObject = wrapper.find('h1');

    expect(titleObject.text()).toBe(title);
    expect(titleObject.classes()).toContain(color);
    expect(titleObject.classes()).toContain(size);
    expect(titleObject.classes()).toContain(weight);

});
