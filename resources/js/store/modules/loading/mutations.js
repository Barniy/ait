import * as types from './mutation-types';

export default {
    [types.START_LOADING](state) {
        state.loading++;
    },
    [types.FINISH_LOADING](state) {
        state.loading--;
    }
};