
export function getLanguage() {
    let language = document.querySelector('div[data-laguage]').innerHTML;

    return JSON.parse(language);
}
