import TitleCard from "@/Shared/Cards/TitleCard.vue";
import { mount } from "@vue/test-utils";
import LessonStatusIndicator from "@/Shared/Indicators/LessonStatusIndicator.vue";

const wrapper = mount(TitleCard, {
    props: {
        mainTitle: "Test Title",
        subTitle: "Test Sub Title",
        label: "Test Label",
        content: "This is some test content",
        showAction: true,
        actionProp: "locked",
    },
    components: {
        lessonStatus: LessonStatusIndicator
    }
});

test("Title rendering correctly", function () {
    const title = wrapper.find("#title-card-title").text();
    const expectedText = "Test Title - Test Sub Title";

    const matches = title === expectedText;

    expect(matches).toBeTruthy();
});

test("Content rendering correctly", function () {
    const content = wrapper.find("#title-card-content").text();
    const expectedText = "This is some test content";

    const matches = content === expectedText;

    expect(matches).toBeTruthy();
});

test("Label rendering correctly", function () {
    const label = wrapper.find("#title-card-label").text();
    const expectedText = "Test Label";

    const matches = label === expectedText;

    expect(matches).toBeTruthy();
});

test("Lesson Status exists", function () {
   let componentExists = wrapper.findComponent(LessonStatusIndicator).exists();

   expect(componentExists).toBeTruthy();
});

