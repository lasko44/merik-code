import types from "@/Shared/Cards/Buttons/utils/types.js";

export default (buttonType) => {
    validateButtonType(buttonType);
    const type = buttonType.toLowerCase();

    return inferComponent(type);
}

function inferComponent(buttonType) {
    let component = types[buttonType] ? types[buttonType].component : null;
    if (!component) {
        throw new Error(`Could not find button component for buttonType "${buttonType}"`);
    } else {
        return component;
    }
}

function validateButtonType(buttonType) {
    if (typeof buttonType !== 'string') {
        throw new Error(`Parameter "buttonType" must be a string, given ${typeof buttonType}`);
    }
}