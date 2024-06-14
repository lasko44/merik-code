// ClickOutsideDirective.js
export const vOut = {
    mounted(el, binding) {
        // Define a function to handle clicks on the document
        const handleClickOutside = (event) => {
            // Check if the clicked element is outside of the bound element
            if (!el.contains(event.target) && el !== event.target) {
                // Call the provided callback function
                binding.value();
            }
        };

        // Attach the click event listener to the document
        document.addEventListener('click', handleClickOutside);

        // Cleanup function to remove event listener when the component is unmounted
        el._clickOutsideDirectiveCleanup = () => {
            document.removeEventListener('click', handleClickOutside);
        };
    },
    beforeUnmount(el) {
        // Clean up the event listener when the component is unmounted
        el._clickOutsideDirectiveCleanup();
        delete el._clickOutsideDirectiveCleanup;
    },
};

