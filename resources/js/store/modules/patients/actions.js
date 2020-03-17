import * as types from './mutation-types';
import ApiService from "../../../services/ApiService";

export const addPatient = ({ commit, dispatch }, payload) => {
    return ApiService.executeCommandPost("patients", payload)
        .then(response => {
            this.$store.commit(types.ADD_PATIENT, response.data.data);
           
        })
        .catch(error => { });
};