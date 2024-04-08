<script setup>
import {provide, ref, watch} from "vue";
import NavigationLink from "@/components/menu/NavigationLink.vue";

const activeMenu = ref(false);

provide('activeMenu', activeMenu);

</script>

<template>
    <nav class="navigation d-flex flex-lg-column justify-content-between px-lg-1 py-lg-4"
         @mousemove="activeMenu = true"
         @mouseout="activeMenu = false"
    >
        <div>
            <button class="btn">
                <img width="30" height="30" src="/assets/home-white.png" alt="Home" />
            </button>
        </div>

        <div class="d-flex flex-lg-column">
            <ul class="list-unstyled">
                <li>
                    <navigation-link
                        href=""
                        nameImage="calendar-check-gray.png"
                        keyMenu=""
                    />
                </li>
                <li>
                    <navigation-link
                        href=""
                        nameImage="calendar-check-gray.png"
                        keyMenu=""
                    />
                </li>
                <li>
                    <navigation-link
                        href=""
                        nameImage="calendar-check-gray.png"
                        keyMenu=""
                    />
                </li>
                <li>
                    <navigation-link
                        href=""
                        nameImage="calendar-check-gray.png"
                        keyMenu=""
                    />
                </li>
                <li>
                    <navigation-link
                        href=""
                        nameImage="calendar-check-gray.png"
                        keyMenu=""
                    />
                </li>
            </ul>
        </div>

        <div>
            <button class="btn">
                <img width="30" height="30" src="/assets/log-out-white.png" alt="Home" />
            </button>
        </div>
    </nav>
</template>

<style scoped>

</style>
