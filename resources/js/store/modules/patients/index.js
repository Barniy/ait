
import * as getters from './getters';
import mutations from './mutations';
import * as actions from './actions';


const initialState = {
    patients: [],
    selectedPatients: [],
    totalPatients: 0,
    patientRegistrationModal: false,
};

export default {
    namespaced: true,

    state: initialState,

    getters: getters,

    actions: actions,

    mutations: mutations
};
