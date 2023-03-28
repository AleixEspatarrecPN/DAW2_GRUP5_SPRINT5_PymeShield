import { createApp, defineAsyncComponent } from "vue/dist/vue.esm-bundler"
import { i18nVue } from 'laravel-vue-i18n'

import Header from "./components/Navbar.vue";
import RouterWeb from '../js/router/index';

import restaurar from "./components/restaurar.vue";
import swiper from './components/swiper.vue';
import inventory from "./components/inventory.vue";
import mapapymeralia from "./components/Map.vue";
import axiosPlugin from './plugins/AxiosPlugin';

// prova
const app = createApp({})

// app.use(RouterWeb)
app.component('swiper', swiper);
app.component('inventory', inventory);
app.use(axiosPlugin);

const admin = defineAsyncComponent(() => import('./components/AdminPanel.vue'));
app.component('admin-layout', admin);

const listdevices = defineAsyncComponent(() => import('./components/ListDevices.vue'));
app.component('list-devices', listdevices);

//Restaurar
const retoredevices = defineAsyncComponent(() => import('./components/restaurar.vue'));
app.component('restore-devices', retoredevices);

//Mapa
const mapa = defineAsyncComponent(() => import('./components/Map.vue'));
app.component('mapa-pymeralia', mapa);


app.use(i18nVue, {
    resolve: async lang => {
        const langs = import.meta.glob('../lang/*.json');
        return await langs[`../lang/${lang}.json`]();
    }
});

app.mount("#app")
// Header
createApp(Header).mount("#navbar");

