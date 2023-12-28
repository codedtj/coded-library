import {usePreferencesStore} from "@/Stores/preferences";
import * as en from "@/i18n/languages/en.js";
import * as ru from "@/i18n/languages/ru.js";
import * as tj from "@/i18n/languages/tj.js";
import { getValueFromPath} from "@/Utils/object";

export function useTranslator(dict = {}) {
    const local = dict;
    const global = {
        en: en.default,
        ru: ru.default,
        tj: tj.default
    };

    const store = usePreferencesStore()

    /**
     * @deprecated use t() instead
     */
    const translate = function translate(word) {
        if (!local[word] || (store.language === 'en' && !local[word][store.language]))
            return word;
        return local[word][store.language]
    }

    const t = function t(key, count = 0) {
        let translated;

        let path = store.language + '.' + key;

        translated = getValueFromPath(local, path);

        if(!translated)
            translated = getValueFromPath(global, path);

        if(!translated)
            translated = key.replaceAll('_', ' ');

        const parts = translated.split('|');

        return count > 1 ? parts[1].trim() : parts[0].trim();
    }

    return {translate, t}
}
