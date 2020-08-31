
import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import Vuetify from 'vuetify';
Vue.use(Vuetify);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navigate-component', require('./components/Admin/Navigate.vue').default);

const routes = [
    { path: "/", component: require("./components/ExampleComponent.vue").default },
    { path: "/room", component: require("./components/Admin/Rooms.vue").default },
    { path: "/room/furniturn", component: require("./components/Admin/Furniturn.vue").default },
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    router,
    el: '#app',
    vuetify: new Vuetify(),
});
