import { createApp, defineAsyncComponent } from "vue/dist/vue.esm-bundler"

import Header from "./components/Navbar.vue";
import RouterWeb from '../js/router/index'

import restaurar from "./components/restaurar.vue";
import swiper from './components/swiper.vue';
import inventory from "./components/inventory.vue";

// prova
const app = createApp({})

// app.use(RouterWeb)
app.component('swiper', swiper);
app.component('inventory', inventory);

const admin = defineAsyncComponent(() => import('./components/AdminPanel.vue'));
app.component('admin-layout', admin);

const listdevices = defineAsyncComponent(() => import('./components/ListDevices.vue'));
app.component('list-devices', listdevices);


app.mount("#app")
// Header
// createApp(Header).mount("#navbar");

