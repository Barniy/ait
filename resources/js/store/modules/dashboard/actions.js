import * as types from './mutation-types';
import ApiService from '../../../services/ApiService';

export const fetchTempPatients = ({ commit, dispatch }, payload) => {
    return ApiService.executeQueryGet("tempPatients")
        .then(response => commit(types.SET_TEMP_PATIENTS, response.data.data))
        .catch(err => console.log(err));
};

export const addTempPatient = ({ commit, dispatch }, payload) => {
    return ApiService.executeCommandPost("tempPatients", payload)
        .then(response => commit(types.ADD_TEMP_PATIENT, response.data.data))
        .catch(error => { });
};