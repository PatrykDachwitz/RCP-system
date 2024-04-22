<script setup>
import {inject, registerRuntimeCompiler} from "vue";

defineProps([
   'href',
   'nameImage',
   'nameImageMove',
   'keyMenu',
]);

const lang = inject('lang');
const activeMenu = inject('activeMenu');

console.log(lang['home'])

function getImageByEventWithSourceElement(e) {
    let parentSourceElement = (e.srcElement).parentElement;
    return parentSourceElement.querySelector('img.menu-image');
}

function changeAllImageToOriginal() {
    let inputsWithActiveClass = document.querySelectorAll('img.menu-image[data-original-image]');

    inputsWithActiveClass.forEach(image => {
       image.src =  image.dataset.originalImage;
    });
}
function changeViewMoveImage(e) {
    changeAllImageToOriginal()
    let image = getImageByEventWithSourceElement(e);
    image.src = image.dataset.moveImage
}

</script>

<template>
    <li
        @mouseleave="(e) => changeAllImageToOriginal(e)"
        @mousemove="(e) => changeViewMoveImage(e)"
    >
        <router-link :to="{name: href}" class="btn d-flex align-items-center">
            <img class="menu-image" width="25" height="25" :src="'/assets/' + nameImage"  :data-move-image="'/assets/' + nameImageMove" data-active="false" :data-original-image="'/assets/' + nameImage"  alt="menu"/>
            <span :class="'ps-2 fs-6 ' + [activeMenu !== true ? 'd-none' : '']">{{ lang[keyMenu] }}</span>
        </router-link>
    </li>
</template>

<style scoped>

</style>
