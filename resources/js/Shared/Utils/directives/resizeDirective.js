
export const vResize = {
        bind(el, binding) {
            console.log('hit');
            const onResize = () => {
                if (binding.value && typeof binding.value === 'function') {
                    binding.value();
                }
            };

            el._onResize = onResize; // Store the function on the element

            // Use ResizeObserver if available, otherwise fallback to window resize
            if (window.ResizeObserver) {
                el._resizeObserver = new ResizeObserver(onResize);
                el._resizeObserver.observe(el);
            } else {
                window.addEventListener('resize', onResize);
            }
        },
        unbind(el) {
            if (el._resizeObserver) {
                el._resizeObserver.unobserve(el);
                el._resizeObserver.disconnect();
                delete el._resizeObserver;
            } else {
                window.removeEventListener('resize', el._onResize);
            }
            delete el._onResize;
        }
};
