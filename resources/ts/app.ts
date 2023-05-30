import './bootstrap';
import * as Vue from 'vue'
import * as VueRouter from 'vue-router';
import type {RouteRecordRaw} from "vue-router";
// @ts-ignore
import App from "./components/App.vue";
// @ts-ignore
import Dashboard from "./components/modules/Dashboard.vue";
// @ts-ignore
import Devices from "./components/modules/Devices.vue";

const routes: Array<RouteRecordRaw> = [
    {path: '/', component: Dashboard},
    {path: '/devices', component: Devices},
    // {path: '/devices/:id', component: Device},
    // {path: '/notifications', component: Notifications},
    // {path: '/docs', component: Documentation},
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

const vueProps = {
    setup() {
    },
    render: () => Vue.h(App),
}

// @ts-ignore
window.scrollToAppUp = function () {
    const element = document.querySelector(`#anchorAppUp`)
    element?.scrollIntoView()
}

Vue.createApp(vueProps)
    .use(router)
    .mount('#app');
