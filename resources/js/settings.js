import {ref} from "vue";
import {createRouter, createWebHistory} from "vue-router";
import frequency from "@/views/frequency.vue";
import historyView from "@/views/historyView.vue";
import contacts from "@/views/contacts.vue";
import notifications from "@/views/notifications.vue";
import Home from "@/views/home.vue";
import addHoliday from "@/views/addHoliday.vue";

export const availableComponentsInPopUp = ref({
    addHoliday
});
const routes = [
    {
        path: '/',
        component: Home,
        name: 'Home'
    }, {
        path: '/notifications',
        component: notifications,
        name: 'notification'
    }, {
        path: '/contact',
        component: contacts,
        name: 'contact'
    }, {
        path: '/history',
        component: historyView,
        name: 'history'
    }, {
        path: '/frequency',
        component: frequency,
        name: 'frequency'
    },
];

export const router = createRouter({
    history: createWebHistory(),
    routes,
})
