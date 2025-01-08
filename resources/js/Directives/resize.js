export default {
    mounted(el, binding) {
        const observer = new ResizeObserver((entries) => {
            for (let entry of entries) {
                if (binding.value && typeof binding.value === "function") {
                    binding.value(entry.contentRect);
                }
            }
        });
        el.__resizeObserver__ = observer; // Store the observer for cleanup
        observer.observe(el);
    },
    unmounted(el) {
        if (el.__resizeObserver__) {
            el.__resizeObserver__.disconnect();
            delete el.__resizeObserver__;
        }
    },
};
