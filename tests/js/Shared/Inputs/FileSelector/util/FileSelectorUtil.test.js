import {test, expect} from "vitest";
import {isVueFile} from "@/Shared/Inputs/FileSelector/util/FileSelectorUtil.js";

test('tests that file ends with vue', () => {

    const valid1 = "test.vue";
    const valid2 = "thisislonger.test.vue";
    const invalid1 = "testvue";
    const invalid2 = "test.vue.js"

    expect(isVueFile(valid1)).toBeTruthy();
    expect(isVueFile(valid2)).toBeTruthy();
    expect(isVueFile(invalid1)).toBeFalsy();
    expect(isVueFile(invalid2)).toBeFalsy();
})
