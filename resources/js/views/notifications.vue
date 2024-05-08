<script setup>
import {inject} from "vue";

const lang = inject('lang')
</script>

<template>
    <section class="notifications d-flex flex-column justify-content-start py-2 px-3">
        <template v-for="item in 10">
            <div class="notification d-flex py-3 align-items-center justify-content-between px-2">
                <div class="d-flex justify-content-start align-items-center me-4">
                    <button class="btn btn-danger">{{  lang['cancel'] }}</button>
                    <button class="btn btn-success ms-2">{{  lang['accept'] }}</button>
                </div>

                <div class="d-flex notification-content flex-column align-items-start">
                    <strong class="text-dark">12.05.2024</strong>
                    <p class="m-0 text-dark">Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</p>
                </div>
                <div>
                    <picture>
                        <source srcset="/assets/close.webp" type="image/webp">
                        <img src="/assets/close.png" class="pointer-event" alt="close" width="15" height="15">
                    </picture>
                </div>

            </div>
        </template>
    </section>

</template>

<style scoped>

</style>
