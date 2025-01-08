import { mount } from "@vue/test-utils";
import { describe, it, beforeEach, afterEach, expect, vi } from "vitest";
import clickOutside from "@/directives/clickOutside";

describe("clickOutside directive", () => {
    let wrapper;
    let onClickOutsideMock;

    beforeEach(() => {
        onClickOutsideMock = vi.fn();

        const TestComponent = {
            template: `
                <div>
                    <div v-click-outside="onClickOutside" class="inside">Inside</div>
                    <div class="outside">Outside</div>
                </div>
            `,
            methods: {
                onClickOutside: onClickOutsideMock,
            },
        };

        wrapper = mount(TestComponent, {
            global: {
                directives: {
                    clickOutside,
                },
            },
        });
    });

    afterEach(() => {
        wrapper.unmount();
        vi.restoreAllMocks();
    });

    it("calls the handler when clicking outside the element", () => {
        const outsideElement = document.createElement("div");
        document.body.appendChild(outsideElement);

        // Simulate clicking outside
        outsideElement.click();

        // Verify the handler was called
        expect(onClickOutsideMock).toHaveBeenCalled();

        document.body.removeChild(outsideElement);
    });

    it("does not call the handler when clicking inside the element", async () => {
        const insideElement = wrapper.find(".inside");

        // Simulate clicking inside
        await insideElement.trigger("click");

        // Verify the handler was not called
        expect(onClickOutsideMock).not.toHaveBeenCalled();
    });
});
