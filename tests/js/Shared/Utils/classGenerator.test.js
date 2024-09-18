import classGenerator from "@/Shared/Utils/classGenerator.js";
import {expect, test} from "vitest";

/**
 * Tests class generator test returns custom and default classes
 */

test("invalid custom classes", () => {
    let classString = "this wont work";
    expect(() => classGenerator(classString)).toThrowError("Parameter");
});

test("valid input with no default classes", () => {
    const validInput = ['class1', 'class2', 'class3'];
    const expectedLength = 3;

    const result = classGenerator(validInput).size;
    expect(result).toBe(expectedLength);
});