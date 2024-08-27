import HomePage from "../components/HomePage.vue";
import LoginPage from "../components/LoginPage.vue";
import SettingsPage from "../components/SettingsPage.vue";
import NotFoundPage from "../components/NotFoundPage.vue";
import RegisterPage from "@/components/RegisterPage.vue";
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/',
        name: "Home",
        component: HomePage,
    },
    {
        path: '/login',
        component: LoginPage,
    },
    {
        path: '/register',
        component: RegisterPage,
    },
    {
        path: '/settings',
        component: SettingsPage,
    },
    {
        path: '/:patchMatch(.*)*',
        component: NotFoundPage,
    }
]

const router = createRouter({
        history: createWebHistory(),
        routes,
    }
);

export default router;
