<script setup>

import {useRoute, useRouter} from "vue-router";
import DashBoard from "@/components/DashBoard.vue";

const route = useRoute();
const router = useRouter();

</script>

<template>
    <dash-board>

        <template v-slot:content-body>
            <router-view/>
        </template>
    </dash-board>
</template>

<style scoped>

</style>
