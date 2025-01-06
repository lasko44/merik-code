import { mount } from '@vue/test-utils';
import { describe, it, vi, beforeEach, afterEach, expect } from 'vitest';
import resize from "@/Directives/resize.js";

describe('ResizeObserver Directive', () => {
    let mockResizeObserver;

    beforeEach(() => {
        // Mock the ResizeObserver
        mockResizeObserver = vi.fn((callback) => {
            return {
                observe: vi.fn(),
                disconnect: vi.fn(),
                triggerResize: (contentRect) => {
                    callback([{ contentRect }]);
                },
            };
        });
        global.ResizeObserver = mockResizeObserver;
    });

    afterEach(() => {
        delete global.ResizeObserver;
    });


    it('calls the provided callback on resize', async () => {
        const callback = vi.fn();
        const contentRect = { width: 150, height: 300 };

        // Create a component to apply the directive
        const wrapper = mount(
            {
                template: `<div v-resize="onResize"></div>`,
                directives: {
                    resize: resize,
                },
                methods: {
                    onResize: callback,
                },
            }
        );

        // Trigger the resize observer callback
        const observerInstance = mockResizeObserver.mock.results[0].value;
        observerInstance.triggerResize(contentRect);

        // Assert the callback was called with correct arguments
        expect(callback).toHaveBeenCalledWith(contentRect);
    });

    it('disconnects the observer on unmount', () => {
        const wrapper = mount(
            {
                template: `<div v-resize="onResize"></div>`,
                directives: {
                    resize: resize,
                },
                methods: {
                    onResize: vi.fn(),
                },
            }
        );

        // Assert the observer was created and observing
        const observerInstance = mockResizeObserver.mock.results[0].value;
        expect(observerInstance.observe).toHaveBeenCalled();

        // Unmount the component
        wrapper.unmount();

        // Assert the observer was disconnected
        expect(observerInstance.disconnect).toHaveBeenCalled();
    });
});
