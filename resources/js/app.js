/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import moment from 'moment';
import VueLodash from 'vue-lodash';
import lodash from 'lodash';
import '@mdi/font/css/materialdesignicons.css';
require("vue-awesome-notifications/dist/styles/style.css");
import 'nprogress/nprogress.css';


import store from './store/index';

const vuetifyOptions = {};
Vue.use(VueLodash, { name: 'custom', lodash: lodash });
Vue.use(Vuetify);
Vue.use(VueRouter);
import 'vuetify/dist/vuetify.min.css';
import Auth from './auth';

Vue.prototype.$auth = new Auth(window.user);
Vue.component('admin', require('./components/admin.vue').default);

Vue.filter('formatDate', function (value) {
    if (value) {
        return moment(String(value)).format('MM/DD/YYYY');
    }
});


import Dashboard from './views/dashboard/Dashboard';
import Settings from './views/settings/Settings';
import Users from './views/users/Users';
import Role from './views/users/Roles';
import Permissions from './views/users/Permissions';
import Patients from './views/patients/patients';
import PatientDetail from './views/patients/PatientDetail';
import Appointment from './views/appointment/appointment';
import LabRequest from './views/laboratory/labRequest';
import ImagingRequest from './views/Imaging/ImagingRequest';
import Ward from './views/ward/ward';
import Billing from './views/billing/billing';
import FrontDeskDashboard from './views/dashboard/FrontDeskDashboard';
import NurseDeskDashboard from './views/dashboard/nurseDashboard';
const routes = [{
    path: "/admin/front-desk",
    component: FrontDeskDashboard
},
{
    path: '/admin/nurse-dashboard/',
    component: NurseDeskDashboard
},
{
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
    path: '/admin/appointment',
    component: Appointment
},
{
    path: '/admin/patient/:id',
    component: PatientDetail,
    props: true
},
{
    path: '/admin/labRequests',
    component: LabRequest,
    props: true
},
{
    path: '/admin/imagingRequests',
    component: ImagingRequest,
    props: true
},
{
    path: '/admin/ward',
    component: Ward,
    props: true
},
{
    path: '/admin/billing',
    component: Billing,
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
    store,
    vuetify: new Vuetify(vuetifyOptions)
});
