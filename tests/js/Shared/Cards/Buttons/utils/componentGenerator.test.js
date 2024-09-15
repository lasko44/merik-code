import componentGenerator from "@/Shared/Cards/Buttons/utils/componentGenerator.js";

import { expect, test } from 'vitest'

test('returns locked component', () => {
    const result = componentGenerator('locked');
    expect(result.__name).toBe("LockedButton");
});