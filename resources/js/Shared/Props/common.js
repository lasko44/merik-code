export const actionProp = {
    type: Object,
    required: false,
    default: null,
    validator: function (value) {
        const type = value.buttonType.toLowerCase();
        return (type === 'link' || type === 'locked') && type === 'link' ? value.link !== null : false;
    },
};

export const defaultEmptyOptionalArrayProp = {
    type: Array,
    required: false,
    default: [],
}

export const defaultOptionalNumber = ( defaultNumber) => {
    return {
        type: Number,
        required: false,
        default: defaultNumber
    }
}

export const defaultOptionalArrayProp = (defaultArray = []) => {
    return {
        type: Array,
        required: false,
        default: defaultArray
    }
};
export const requiredArrayProp = {
    type: Array,
    required: true
};

export const requiredStringProp = {
    type: String,
    required: true,
};

export const optionalStringProp = {
    type: String,
    required: false,
};
export const optionalStringDefaultProp = (defaultString = "") => {
    return {
        type: String,
        required: false,
        default: defaultString,
    }
};

export const optionalProp = {
    required: false
};

export const requiredProp = {
    required: true
};

export const defaultTrueBoolProp = {
    type: Boolean,
    required: false,
    default: true,
};

export const defaultFalseBoolProp = {
    type: Boolean,
    required: false,
    default: false,
};

export const themeColorProp = {
    type: String,
    validator: function (value) {
        return ['black', 'green', 'red', 'blue'].includes(value);
    },
    default: 'black',
};