import * as types from './mutation-types';

export default {
    [types.PATIENT_MODAL](state) {
        state.patientRegistrationModal = !state.patientRegistrationModal;
    },
    [types.ADD_PATIENT](state, data) {
        state.patients.push(data);
    }
};