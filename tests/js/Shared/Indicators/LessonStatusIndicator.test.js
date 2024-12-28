import { shallowMount } from "@vue/test-utils";
import LessonStatusIndicator from "@/Shared/Indicators/LessonStatusIndicator.vue";


test("Test In Progress Status ", function () {
    const wrapper = shallowMount(LessonStatusIndicator, {
        props: {
            inProgress: true,
            action: {
                buttonType: "link",
                link: "mock"
            }
        }
    });
    const inProgressStatus = wrapper.vm.statuses.inProgress;
    const status = wrapper.vm.status;
    const matches = inProgressStatus === status;

    expect(matches).toBeTruthy();

});


test("Test Completed Status", function () {
    const wrapper = shallowMount(LessonStatusIndicator, {
        props: {
            completed: true,
            action: {
                buttonType: "link",
                link: "mock"
            }
        }
    });
    const completedStatus = wrapper.vm.statuses.completed;
    const status = wrapper.vm.status;
    const matches = completedStatus === status;

    expect(matches).toBeTruthy();
});

test("Test Get Started Status", function () {
    const wrapper = shallowMount(LessonStatusIndicator, {
        props: {
            action: {
                buttonType: "link",
                link: "mock"
            }
        }
    });
    const getStartedStatus = wrapper.vm.statuses.getStarted;
    const status = wrapper.vm.status;
    const matches = getStartedStatus === status;

    expect(matches).toBeTruthy();
});
