export const computedBoxSize = (element) => {
    let computedStyles = getComputedStyle(element);
    let parentElHeight = toNumber(computedStyles.height);
    let parentElWidth = toNumber(computedStyles.width);


    return {
        height: parentElHeight - paddingHeight(computedStyles),
        width: parentElWidth - paddingWidth(computedStyles),
    }
}

function paddingHeight (computedStyles) {
    let paddingTop = computedStyles.paddingTop;
    let paddingBottom = computedStyles.paddingBottom;

    return toNumber(paddingTop) + toNumber(paddingBottom);
}

function paddingWidth(computedStyles)  {
    let paddingLeft = computedStyles.paddingLeft;
    let paddingRight = computedStyles.paddingRight;

    return toNumber(paddingLeft) + toNumber(paddingRight);
}


function toNumber(styleString) {
    const px = 'px';
    return parseInt(styleString.replace("px",''));
}