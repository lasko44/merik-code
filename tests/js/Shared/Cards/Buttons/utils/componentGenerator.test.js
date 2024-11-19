import componentGenerator from "@/Shared/Cards/Buttons/utils/componentGenerator.js";

import { expect, test } from 'vitest'

test("returns locked component", () => {
    const result = componentGenerator('locked');
    expect(result.__name).toBe("LockedButton");
});

test("throws validate button error", () => {
    const float = parseFloat("1");
    expect(() => componentGenerator(float)).toThrowError('string');
});

test("throws bad component error", () => {
    expect(() => componentGenerator("testyTester")).toThrowError('component');
});