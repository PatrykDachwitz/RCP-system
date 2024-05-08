import {ref, toValue, watch, watchEffect} from "vue";

export function fetchGet(url) {
    const data = ref(null);
    const dataError = ref(null);

    watchEffect(() => {
        fetch(toValue(url))
            .then(response => {
                if (response.status >= 300) return throw Error('error status code');
                else response.json();
            })
            .then(json => data.value = json)
            .catch( err => dataError.value = err)
    })

    return {
        data,
        dataError,
    }
}
