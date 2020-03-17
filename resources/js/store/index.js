import Vue from 'vue';
import Vuex from 'vuex';

// modules
import loading from './modules/loading';
import patients from './modules/patients';
import dashboard from './modules/dashboard';
import department from './modules/department';


import * as getters from './getters';
import mutations from './mutations';
import actions from './actions';

Vue.use(Vuex);
const initialSate = {

};

export default new Vuex.Store({
    strict: true,
    state: initialSate,
    getters,
    mutations,
    actions,

    modules: {
        loading,
        patients,
        dashboard,
        department
    }
});

