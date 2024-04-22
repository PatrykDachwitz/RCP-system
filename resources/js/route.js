import {createRouter, createWebHistory} from "vue-router";
import Home from "@/views/home.vue";
import notifications from "@/views/notifications.vue";
import contacts from "@/views/contacts.vue";
import holidays from "@/views/holidays.vue";
import frequency from "@/views/frequency.vue";
import historyView from "@/views/historyView.vue";
import addHoliday from "@/views/addHoliday.vue";


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
        path: '/holidays',
        component: addHoliday,
        name: 'holiday'
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
