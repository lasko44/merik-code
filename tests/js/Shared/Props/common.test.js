import {
    actionProp,
    defaultOptionalArrayProp,
    defaultOptionalNumber,
    optionalStringDefaultProp, themeColorProp
} from "@/Shared/Props/common.js";
import {expect, test} from "vitest";
/**
 * prop validation tests
 */

test("valid actionProp value", () => {
    const linkType = {buttonType: "link", link: '/test'};
    const lockType = {buttonType: "locked"};

    expect(actionProp.validator(linkType)).toBe(true);
    expect(actionProp.validator(lockType)).toBe(true);
});

test("test actionProp link type button", () => {
    const validLinkObject = {
        buttonType: 'link',
        link: '/this/is/a-test'
    };

    const invalidLinkObject = {
        buttonType: 'link',
        link: null
    };

    expect(actionProp.validator(validLinkObject)).toBe(true);
    expect(actionProp.validator(invalidLinkObject)).toBe(false);
});

test("defaultOptionalNumber test", () => {
    const expected = {
        type: Number,
        required: false,
        default: 22
    }

    const result = defaultOptionalNumber(22);

    expect(result.type).toBe(expected.type);
    expect(result.required).toBe(expected.required);
    expect(result.default).toBe(expected.default);
});

test("defaultOptionalArrayProp test", () => {
    const expected = {
        type: Array,
        required: false,
        default: [1, 2, 3],
    };

    const result = defaultOptionalArrayProp([1, 2, 3]);

    expect(result.type).toBe(expected.type);
    expect(result.required).toBe(expected.required);
    expect(result.default).toEqual(expected.default);
});

test("optionalStringDefaultProp test", () => {
    const expected = {
        type: String,
        required: false,
        default: "test"
    };

    const result = optionalStringDefaultProp("test");

    expect(result.type).toBe(expected.type);
    expect(result.required).toBe(expected.required);
    expect(result.default).toBe(expected.default);
});

test("themeColorProp test", () => {
    const validProp = "red";
    const invalidProp = "purple";

    expect(themeColorProp.validator(validProp)).toBe(true);
    expect(themeColorProp.validator(invalidProp)).toBe(false);
});