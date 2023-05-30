import './bootstrap';
import * as Vue from 'vue'
// @ts-ignore
import Auth from "./components/Auth.vue";

// Components

const vueProps = {
    setup () {},
    render: () => Vue.h(Auth),
}

// @ts-ignore
window.scrollToAppUp = function () {
    const element = document.querySelector(`#anchorAppUp`)
    element?.scrollIntoView()
}

Vue.createApp(vueProps)
    .mount('#auth');
