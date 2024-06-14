const TEXT_SIZES = ['xs', 'sm', 'md', 'lg', 'xl', 'xxl', 'xxxl'];
const ICON_SIZES = ['xs', 'sm', 'md', 'lg', 'xl'];
const THEMES = ['black', 'blue', 'red', 'green'];

export default (params) => {
    let keys = {
        textSize: null,
        iconSize: null,
        textTheme: null,
        iconTheme: null,
    };

    if (params.textSize) {
        keys.textSize = checkTextSize(params.textSize);
    }
    if(params.iconSize){
        keys.iconSize = checkIconSize(params.iconSize);
    }
    if (params.textTheme) {
        keys.textTheme = checkTextTheme(params.textTheme);
    }
    if(params.iconTheme){
        keys.iconTheme = checkIconTheme(params.iconTheme);
    }
    return keys
}


function checkTextSize(textSize) {
    validateString(textSize);
    const lowerCase = textSize.toLowerCase();
    if (TEXT_SIZES.indexOf(lowerCase) === -1) {
        throw new Error(`${lowerCase} is not a valid text size must be one of these: ${TEXT_SIZES.toString()}`);
    }
    return lowerCase;
}

function checkIconSize(iconSize) {
    validateString(iconSize);
    const lowerCase = iconSize.toLowerCase();
    if (ICON_SIZES.indexOf(lowerCase) === -1) {
        throw new Error(`${lowerCase} is not a valid icon size must be one of these: ${ICON_SIZES.toString()}`);
    }
    return lowerCase;
}

function checkTextTheme(theme) {
    validateString(theme);
    const lowerCase = theme.toLowerCase();
    if(THEMES.indexOf(theme) === -1){
        throw new Error(`${lowerCase} is not a valid text theme must be on of these: ${THEMES.toString()}`);
    }
    return lowerCase;
}

function checkIconTheme(theme) {
    validateString(theme);
    const lowerCase = theme.toLowerCase();
    if(THEMES.indexOf(theme) === -1){
        throw new Error(`${lowerCase} is not a icon text theme must be on of these: ${THEMES.toString()}`);
    }
    return lowerCase;
}

function validateString(item) {
    const type = typeof item;
    if (type !== "string") {
        throw new Error(`Cannot Generate Class Key all arguments must type string, but was given a ${type}`);
    }
}