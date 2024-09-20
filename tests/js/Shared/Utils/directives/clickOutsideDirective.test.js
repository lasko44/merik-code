import { describe, it, expect, beforeEach, afterEach, vi } from 'vitest';
import { createApp, ref } from 'vue';
import {vOut} from "@/Shared/Utils/directives/clickOutsideDirective.js";

describe('vOut Directive', () => {
    let app;
    let container;

    beforeEach(() => {
        app = createApp({
            template: '<div v-out="onClickOutside"><div id="inner">Click inside</div></div>',
            setup() {
                const onClickOutside = vi.fn();
                return { onClickOutside };
            }
        });

        // Create a container for mounting the app
        container = document.createElement('div');
        document.body.appendChild(container);
        app.directive('out', vOut);
        app.mount(container);
    });

    afterEach(() => {
        app.unmount();
        container.remove();
    });

    it('should call the callback when clicking outside', async () => {
        const inner = container.querySelector('#inner');
        const outer = container.firstChild;

        // Simulate a click outside
        await new Promise((resolve) => {
            document.addEventListener('click', () => {
                expect(inner).toBeTruthy();
                expect(outer).toBeTruthy();
                resolve();
            }, { once: true });
            document.body.click(); // Click anywhere in the document
        });

        // Assert that the callback was called
        expect(app._instance.setupState.onClickOutside).toHaveBeenCalled();
    });

    it('should not call the callback when clicking inside', async () => {
        const inner = container.querySelector('#inner');

        // Simulate a click inside the element
        await new Promise((resolve) => {
            inner.click();
            resolve();
        });

        // Assert that the callback was not called
        expect(app._instance.setupState.onClickOutside).not.toHaveBeenCalled();
    });

    it('should clean up the event listener on unmount', () => {
        const cleanupSpy = vi.spyOn(container.firstChild, '_clickOutsideDirectiveCleanup');
        app.unmount();
        expect(cleanupSpy).toHaveBeenCalled();
    });
});
