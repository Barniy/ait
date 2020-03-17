import * as types from './mutation-types';

export default {
    [types.SET_DEPARTMENTS](state, payload) {
        state.departments.push(...payload);
    },
};
