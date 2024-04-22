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
                <navigation-link
                    href="notification"
                    nameImage="notification-gray.png"
                    nameImageMove="notification-white.png"
                    keyMenu="notification"
                />
                <navigation-link
                    href="holiday"
                    nameImage="calendar-add-gray.png"
                    nameImageMove="calendar-add-white.png"
                    keyMenu="addHolidays"
                />
                <navigation-link
                    href="frequency"
                    nameImage="calendar-wait-gray.png"
                    nameImageMove="calendar-wait-white.png"
                    keyMenu="frequency"
                />
                <navigation-link
                    href="history"
                    nameImage="calendar-check-gray.png"
                    nameImageMove="calendar-check-white.png"
                    keyMenu="historyFrequency"
                />
                <navigation-link
                    href="contact"
                    nameImage="support-gray.png"
                    nameImageMove="support-white.png"
                    keyMenu="contactSupport"
                />

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
