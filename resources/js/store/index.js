import Vue from 'vue';
import Vuex from 'vuex';
import loading from './modules/loading';
import patients from './modules/patients';

import * as getters from './getters';
import mutations from './mutations';
import actions from './actions';

Vue.use(Vuex);
const intialSate = {

};

export default new Vuex.Store({
    strict: true,
    state: intialSate,
    getters,
    mutations,
    actions,

    modules: {
        loading,
        patients
    }
});

