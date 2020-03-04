/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
import VueRouter from 'vue-router';

const vuetifyOptions = {};

Vue.use(Vuetify);
Vue.use(VueRouter);

import 'vuetify/dist/vuetify.min.css';
import Auth from './auth';

Vue.prototype.$auth = new Auth(window.user);
Vue.component('admin', require('./components/admin.vue').default);


import Dashboard from './views/dashboard/Dashboard';
import Settings from './views/settings/Settings';
import Users from './views/users/Users';
import Role from './views/users/Roles';
import Permissions from './views/users/Permissions';
import Patients from './views/patients/patients';
import PatientDetail from './views/patients/PatientDetail';
const routes = [{
        path: "/admin/",
        component: Dashboard
    },
    {
        path: '/admin/users',
        component: Users
    },
    {
        path: '/admin/users/roles',
        component: Role
    },
    {
        path: '/admin/users/permissions',
        component: Permissions
    },
    {
        path: '/admin/settings',
        component: Settings
    },
    {
        path: '/admin/patients',
        component: Patients
    },
    {
        path: '/admin/patient/:id',
        component: PatientDetail,
        props: true
    }
];

const router = new VueRouter({
    routes,
    mode: 'history',
    linkActiveClass: 'active'
});



const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(vuetifyOptions)
});
