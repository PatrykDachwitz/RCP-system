<script setup>
import Navigation from "@/components/menu/Navigation.vue";
import Profil from "@/components/menu/Profil.vue";
import {inject} from "vue";

const availableComponentsInPopUp = inject('availableComponentsInPopUp')
const currentSelectPopUp = inject('currentSelectPopUp')
</script>

<template>

    <navigation />
    <profil />

    <section class="content min-vh-100 max-vh-100 d-flex justify-content-center align-items-center">
        <div class="content-body d-flex flex-column">
            <div class="content-body__header d-flex align-items-center">
                <span class="fs-4 ps-4 text-white">
                    <slot name="content-header">

                    </slot>
                </span>
            </div>
            <div class="content-body__body d-flex flex-column overflow-y-auto position-relative">
                <component :is="availableComponentsInPopUp[currentSelectPopUp]"/>
                <slot name="content-body">
                </slot>
            </div>
        </div>

    </section>
</template>

<style scoped>

</style>
