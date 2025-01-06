import { mount } from '@vue/test-utils';
import { describe, it, expect, vi } from 'vitest';
import Login from "@/Pages/Auth/Login.vue";
import {useForm} from "@inertiajs/vue3";


// Mock Inertia and Ziggy
vi.mock('@inertiajs/vue3', () => ({
    Head: {
        name: 'Head',
        template: '<div><slot /></div>',
    },
    useForm: vi.fn(() => ({
        username: '',
        password: '',
        remember: false,
        post: vi.fn(),
    })),
}));

vi.mock('@/Layouts/MainLayout.vue', () => ({
    default: {
        name: 'MainLayout',
        template: '<div><slot /></div>',
    },
}));

vi.mock('ziggy-js', () => ({
    route: vi.fn((name) => `/route/${name}`),
}));

describe('Login.vue', () => {
    it('renders the login form correctly', () => {
        const wrapper = mount(Login);

        // Check if the image renders
        const img = wrapper.find('img');
        expect(img.exists()).toBe(true);
        expect(img.attributes('src')).toBe('images/avatar.png');
        expect(img.attributes('alt')).toBe('merik-logo');

        // Check if child components render
        expect(wrapper.findComponent({ name: 'Text' }).exists()).toBe(true);
        expect(wrapper.findComponent({ name: 'Password' }).exists()).toBe(true);
        expect(wrapper.findComponent({ name: 'Checkbox' }).exists()).toBe(true);
        expect(wrapper.findComponent({ name: 'Button' }).exists()).toBe(true);
    });

    it('updates form data on input', async () => {
        const wrapper = mount(Login);

        // Find the inputs
        const usernameInput = wrapper.findComponent({ name: 'Text' });
        const passwordInput = wrapper.findComponent({ name: 'Password' });
        const rememberCheckbox = wrapper.findComponent({ name: 'Checkbox' });

        // Simulate input changes
        await usernameInput.setValue('testUser');
        await passwordInput.setValue('password123');
        await rememberCheckbox.find('input').setValue(true);

        const form = wrapper.vm.form;

        // Assert form data updates correctly
        expect(form.username).toBe('testUser');
        expect(form.password).toBe('password123');
        expect(form.remember).toBe(true);
    });

    it('calls the submit function on button click', async () => {
        const mockPost = vi.fn();
        vi.mocked(useForm).mockReturnValueOnce({
            username: '',
            password: '',
            remember: false,
            post: mockPost,
        });

        const wrapper = mount(Login);
        const button = wrapper.findComponent({ name: 'Button' });

        // Simulate button click
        await button.trigger('click');

        // Verify post is called with the correct route
        expect(mockPost).toHaveBeenCalledWith('/route/login.store');
    });
});
