import {expect, test} from "vitest";
import classKeyGenerator from "@/Shared/Utils/classKeyGenerator.js";

/**
 * Tests for classKeyGenerator
 */

test("test invalid string input", () => {
    const invalidTextInput = 4;
    const invalidIconInput = {bad: "test"};
    const invalidTextThemeInput = [];
    const invalidThemeInput = true;
    const expectedError = "all arguments must type string";

    expect(() => {
        classKeyGenerator({textSize: invalidTextInput})
    }).toThrowError(expectedError);

    expect(() => {
        classKeyGenerator({iconSize: invalidIconInput})
    }).toThrowError(expectedError);

    expect(() => {
        classKeyGenerator({textTheme: invalidTextThemeInput})
    }).toThrowError(expectedError);

    expect(() => {
        classKeyGenerator({iconTheme: invalidThemeInput})
    }).toThrowError(expectedError);
});

test("key does not exist test", () => {
    const badSize = "cv";
    const badIcon = "bf";
    const badTextTheme = "purple";
    const badTheme = "yellow";

    expect(() => {
        classKeyGenerator({textSize: badSize});
    }).toThrowError("valid text size");

    expect(() => {
        classKeyGenerator({iconSize: badIcon});
    }).toThrowError("valid icon size");

    expect(() => {
        classKeyGenerator({textTheme: badTextTheme});
    }).toThrowError("valid text theme");

    expect(() => {
        classKeyGenerator({iconTheme: badTheme});
    }).toThrowError("icon text theme");
});

test("valid inputs", () => {
    const size = "xs";
    const theme = "black";
    const params = {
        textSize: size,
        iconSize: size,
        textTheme: theme,
        iconTheme: theme
    };

    const result = classKeyGenerator(params);

    expect(result).toEqual(params);

});