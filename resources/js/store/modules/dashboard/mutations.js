import * as types from './mutation-types';

export default {
    [types.SET_TEMP_PATIENTS](state, payload) {
      
        state.tempPatients.push(...payload);
    },
    [types.Temp_PATIENT_MODAL](state) {
        state.tempPatientRegistrationModal = !state.tempPatientRegistrationModal;
    },
    [types.ADD_TEMP_PATIENT](state, payload) {
        state.tempPatients.push(payload);
    }
};