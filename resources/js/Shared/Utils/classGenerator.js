export default (customClasses, defaultClasses = []) => {
    if(!Array.isArray(customClasses)){
        throw new Error(`Parameter "customClasses" must be an Array given ${typeof customClasses}`);
    }
    else{
        let merged = defaultClasses.concat(customClasses);
        return new Set(merged);
    }
}