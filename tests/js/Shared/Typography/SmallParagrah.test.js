import {mount} from "@vue/test-utils";
import SmallParagraph from "@/Shared/Typography/SmallParagraph.vue";
import {expect, test} from "vitest";
import {COLORS, TEXT_SIZES, WEIGHT} from "@/Shared/Typography/utils/classes.js";

test("small paragraph test", () => {
    const size = TEXT_SIZES.SM;
    const color = COLORS.GREEN;
    const weight = WEIGHT.MEDIUM;
    const content = "this is some test content";

    const wrapper = mount(SmallParagraph, {
        props: {
            content: content,
            theme: 'green'
        }
    });

    const paragraph = wrapper.find('p');
    const classes = paragraph.classes();

    expect(paragraph.text()).toBe(content);
    expect(classes).toContain(size);
    expect(classes).toContain(color);
    expect(classes).toContain(weight);
});