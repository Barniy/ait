import * as types from './mutation-types';
import ApiService from "../../../services/ApiService";

export const fetchDepartments = ({ commit, dispatch }, payload) => {
    return ApiService.executeQueryGet("departments")
        .then(response => commit(types.SET_DEPARTMENTS, response.data.data))
        .catch(err => console.log(err));
};