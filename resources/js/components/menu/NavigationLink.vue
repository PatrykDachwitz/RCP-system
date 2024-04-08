<script setup>
import {inject} from "vue";

defineProps([
   'href',
   'nameImage',
   'keyMenu',
]);

const activeMenu = inject('activeMenu');
</script>

<template>
    <router-link :to="href" class="btn d-flex align-items-center">
        <img width="30" height="30" :src="'/assets/' + nameImage" />
        <span :class="'ps-2 fs-5 ' + [activeMenu !== true ? 'd-none' : '']">test</span>
    </router-link>
</template>

<style scoped>

</style>
