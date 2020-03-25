import axios from 'axios';
import store from '../store';
import AWN from "awesome-notifications";

// notification 
let globalOptions = {
    "position": "top-right"
};
// Initialize instance of AWN
let notifier = new AWN(globalOptions);


const apiClient = axios.create({
    baseURL: `http://localhost:8000/api/`,
    withCredentials: false, // This is the default
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
});

apiClient.interceptors.request.use(config => { // Called on request
    store.commit('loading/START_LOADING');
    return config;
}, error => {
    store.commit('loading/FINISH_LOADING');
    return Promise.reject(error);
});
apiClient.interceptors.response.use(response => { // Called on response
    store.commit('loading/FINISH_LOADING');
    return response;
}, error => {
    store.commit('loading/FINISH_LOADING');
    return Promise.reject(error);
});
export default {
    // api get request for query
    executeQueryGet(url) {
        return apiClient.get(url);
    },

    // api post request for query
    executeQueryPost(url, params) {
        return apiClient.post(url, params);
    },

    // api post request for command
    executeCommandPost(url, params) {
        let promise = apiClient.post(url, params);
        new AWN(globalOptions).asyncBlock(promise,
            resp => notifier.success(`${resp.data.message}`),
            err => notifier.alert(`API responded with error: ${err.response.status}`));
        return promise;
    },

    // api update request for command
    executeCommandUpdate(url, params) {
        let promise = apiClient.put(url, params);
        new AWN(globalOptions).asyncBlock(promise);
        return promise;
    }
};