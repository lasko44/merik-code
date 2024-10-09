import { mount } from '@vue/test-utils';
import { describe, it, beforeEach, expect, vi } from 'vitest';
import FileSelector from '@/Shared/Inputs/FileSelector/FileSelector.vue'; // Adjust the path as needed
import BreadCrumbs from '@/Shared/Inputs/FileSelector/BreadCrumbs.vue';
import Spinner from '@/Shared/Indicators/Spinner.vue';
import { nextTick } from 'vue';
import axios from 'axios';
import {route} from "ziggy-js";

vi.mock('axios');
vi.mock('route');

describe('FileSelector.vue', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = mount(FileSelector, {
            props: {
                label: 'Select File',
                options: [
                    { name: 'Folder1', type: 'directory' },
                    { name: 'File1.vue', type: 'file' },
                ],
                required: false,
            },
            global: {
                components: {
                    BreadCrumbs,
                    Spinner,
                },
            },
        });
    });

    it('renders correctly with props', () => {
        expect(wrapper.text()).toContain('Select Vue Component Home/ Folder1 File1.vueLoading...');
        expect(wrapper.findAll('li')).toHaveLength(2);
    });

    it('displays loading spinner when loading is true', async () => {
        wrapper.vm.loading = true;
        await nextTick();
        expect(wrapper.findComponent(Spinner).exists()).toBe(true);
    });

    it('shows error message when there is an error', async () => {
        wrapper.vm.showError = true;
        await nextTick();
        expect(wrapper.text()).toContain('Error Retrieving Directories');
    });
    

});
