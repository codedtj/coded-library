export function getKeyByValue(object, value){
    return Object.keys(object).find(key => object[key] === value);
}


export function getValueFromPath(object, path) {
    const keys = path.split('.');
    let value = object;

    for (let key of keys) {
        if (!value || !value.hasOwnProperty(key)) {
            return null;
        }
        value = value[key];
    }

    return value;
}
