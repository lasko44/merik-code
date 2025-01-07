export default {
    beforeMount(el, binding) {
        el.clickOutsideEvent = (event) => {
            if (!(el === event.target || el.contains(event.target))) {
                if (typeof binding.value === "function") {
                    binding.value(event); // Call the provided handler
                } else {
                    console.warn("v-click-outside expects a function as its value.");
                }
            }
        };
        document.addEventListener("click", el.clickOutsideEvent);
    },
    unmounted(el) {
        document.removeEventListener("click", el.clickOutsideEvent);
    },
};
