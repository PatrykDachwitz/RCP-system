<script setup>

import {inject} from "vue";

const lang = inject('lang');
const currentSelectPopUp = inject('currentSelectPopUp');
</script>

<template>
    <div class="d-flex w-100 top-0 start-0 justify-content-center align-items-center position-absolute holiday-create">
        <div class="overflow-hidden rounded-2 shadow" style="min-width: 400px">
            <div class="fs-4 bg-dark px-2 py-1 d-flex justify-content-between">
                <span>{{  lang['sendHoliday'] }}</span>
                <button
                    class="btn btn-inline-dark"
                    @click="currentSelectPopUp = 'none'">
                    <picture>
                        <source srcset="/assets/close-white.webp" type="image/webp">
                        <img src="/assets/close-white.png" alt="close input" width="15" height="15">
                    </picture>
                </button>
            </div>
            <div class="d-flex bg-gray-light flex-column px-2 py-1" >

                <div class="m-0 g-1 align-items-center text-dark mb-3 mt-2">
                    <label for="date-start" class="form-label text-dark">{{ lang['date-start'] }}</label>
                    <input type="date" class="form-control text-dark" id="date-start">
                </div>

                <div class="m-0 g-1 align-items-center text-dark mb-3">
                    <label for="date-end" class="form-label text-dark">{{ lang['date-end'] }}</label>
                    <input type="date" class="form-control text-dark" id="date-end">
                </div>
                <div class="text-dark">
                    <label for="date-end" class="form-label text-dark">{{ lang['typeHoliday'] }}</label>
                    <select class="form-select text-dark" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <button class="btn btn-dark my-2">{{ lang['accept'] }}</button>

            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
