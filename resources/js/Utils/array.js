export function shuffle(array) {
    let m = array.length, t, i;

    // While there remain elements to shuffle…
    while (m) {

        // Pick a remaining element…
        i = Math.floor(Math.random() * m--);

        // And swap it with the current element.
        t = array[m];
        array[m] = array[i];
        array[i] = t;
    }

    return array;
}

export function replaceById(array, item) {
    let index = array.map(el => el.id).indexOf(item.id);

    let found = index > -1;
    if (found)
        array[index] = item;

    return found
}

export function pushIfNotExistById(array, item) {
    if (!array.find(e => e.id === item.id))
        array.push(item)
}

export function pushOrDelete(array, item) {
    let index = array.indexOf(item);

    if (index > -1)
        array.splice(index, 1);
    else
        array.push(item);
}

export function pushOrReplaceById(array, item) {
    let index = array.map(el => el.id).indexOf(item.id);

    if (index > -1)
        array[index] = item;
    else
        array.push(item);
}

export function pushOrReplaceBy(array, item, keyInArray, itemKey) {
    let index = array.map(el => el[keyInArray]).indexOf(item[itemKey]);

    if (index > -1)
        array[index] = item;
    else
        array.push(item);
}

export function deleteFromArray(array, item) {
    let index = array.indexOf(item);

    if (index > -1)
        array.splice(index, 1);
}
