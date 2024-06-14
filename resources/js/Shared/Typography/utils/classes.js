export const COLORS = {
    BLACK: 'text-neutral-800',
    BLUE: 'text-cyan-700',
    RED: 'text-red-500',
    GREEN: 'text-emerald-600',
    WHITE: 'text-neutral-100'
}

export const WEIGHT = {
    LIGHT: 'font-light',
    MEDIUM: 'font-medium',
    SEMI_BOLD: 'font-semibold',
    BOLD: 'font-bold',
    EXTRA_BOLD: 'font-extrabold',
}

export const ICON_SIZES = {
    XS: {height:'h-4', width:'w-4'},
    SM: {height:'h-6', width:'w-6'},
    MD: {height:'h-8', width:'w-8'},
    LG: {height:'h-10', width: 'w-10'},
    XL: {height:'h-12', width: 'w-12'},
}

export const TEXT_SIZES = {
    XS: 'text-xs',
    SM: 'text-sm',
    MD: 'text-base',
    LG: 'text-lg',
    XL: 'text-xl',
    XXL: 'text-2xl',
    XXXL: 'text-3xl',
};

export const LargeTitle = ( key ) => {
    const colors = {
        black: [TEXT_SIZES.XL, WEIGHT.BOLD, COLORS.BLACK],
        blue: [TEXT_SIZES.XL, WEIGHT.BOLD, COLORS.BLUE],
        red: [TEXT_SIZES.XL, WEIGHT.BOLD, COLORS.RED],
        green: [TEXT_SIZES.XL, WEIGHT.BOLD, COLORS.GREEN],
    };

    return getObjectValueByKey(key, colors);
}

export const SmallParagraph = ( key ) => {
    const colors = {
        black: [TEXT_SIZES.SM, WEIGHT.MEDIUM, COLORS.BLACK],
        blue: [TEXT_SIZES.SM, WEIGHT.MEDIUM, COLORS.BLUE],
        red: [TEXT_SIZES.SM, WEIGHT.MEDIUM, COLORS.RED],
        green: [TEXT_SIZES.SM, WEIGHT.MEDIUM, COLORS.GREEN],
    }

    return getObjectValueByKey(key, colors);
}

export const SmallIcon = ( key ) => {
    const themes = {
        black: [ICON_SIZES.SM.height, ICON_SIZES.SM.width, COLORS.BLACK],
        blue: [ICON_SIZES.SM.height, ICON_SIZES.SM.width, COLORS.BLUE],
        red: [ICON_SIZES.SM.height, ICON_SIZES.SM.width, COLORS.RED],
        green: [ICON_SIZES.SM.height, ICON_SIZES.SM.width, COLORS.GREEN],
    }

    return getObjectValueByKey(key, themes);
}

export const MediumIcon = ( key ) => {

    const themes = {
        black: [ICON_SIZES.MD.height, ICON_SIZES.MD.width, COLORS.BLACK],
        blue: [ICON_SIZES.MD.height, ICON_SIZES.MD.width, COLORS.BLUE],
        red: [ICON_SIZES.MD.height, ICON_SIZES.MD.width, COLORS.RED],
        green: [ICON_SIZES.MD.height, ICON_SIZES.MD.width, COLORS.GREEN],
    }

    return getObjectValueByKey(key, themes);
}

export const LargeIcon = ( key ) => {
    const themes = {
        black: [ICON_SIZES.LG.width, ICON_SIZES.LG.height, COLORS.BLACK],
        blue: [ICON_SIZES.LG.width, ICON_SIZES.LG.height, COLORS.BLUE],
        red: [ICON_SIZES.LG.width, ICON_SIZES.LG.height, COLORS.RED],
        green: [ICON_SIZES.LG.width, ICON_SIZES.LG.height, COLORS.GREEN],
    }

    return getObjectValueByKey(key, themes);
}

function getObjectValueByKey (key, obj) {
    return obj[key];
}