import { mount } from '@vue/test-utils';
import { describe, it, expect, vi } from 'vitest';
import Error from "@/Pages/Error.vue";

vi.mock('@inertiajs/vue3', () => ({
    Head: {
        name: 'Head',
        template: '<div><slot /></div>',
    },
}));

vi.mock('@/Layouts/MainLayout.vue', () => ({
    default: {
        name: 'MainLayout',
        template: '<div><slot /></div>',
    },
}));

describe('Component.vue', () => {
    it('computes the correct title and description based on status', () => {
        const wrapper = mount(Error, {
            props: {
                status: 404,
            },
        });

        // Check computed properties
        expect(wrapper.vm.title).toBe('404: Page Not Found');
        expect(wrapper.vm.description).toBe(
            "Sorry, the page you are looking for could not be found. Here's a funny animal picture"
        );
    });

    it('selects a random image from the images array', () => {
        const wrapper = mount(Error, {
            props: {
                status: 500,
            },
        });

        const images = [
            '/images/cat-2.jpg',
            '/images/deer.jpg',
            '/images/dog-1.jpg',
            '/images/monkey.jpg',
            '/images/ostritch.jpg',
        ];

        // Check that the selected random image is one of the predefined images
        expect(images).toContain(wrapper.vm.randomImage);
    });

    it('renders the correct title, description, and image in the template', () => {
        const wrapper = mount(Error, {
            props: {
                status: 503,
            },
        });

        // Check rendered title
        expect(wrapper.find('#left-section h1').text()).toBe('503: Service Unavailable');

        // Check rendered description
        expect(wrapper.find('#left-section div.text-lg').text()).toBe(
            'Sorry, we are doing some maintenance. Please check back soon.'
        );

        // Check rendered image
        const imgSrc = wrapper.find('img').attributes('src');
        const images = [
            '/images/cat-2.jpg',
            '/images/deer.jpg',
            '/images/dog-1.jpg',
            '/images/monkey.jpg',
            '/images/ostritch.jpg',
        ];
        expect(images).toContain(imgSrc);
    });
});
