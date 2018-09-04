
//import LocalStorage from './services/localStorage'
import AppConfig from './services/appConfig';
// import Vuex from 'vuex';

require('materialize-css');
window.Vue = require('vue');
// window.Vue.use(Vuex);
require('vue-resource');
require('vuex');
Vue.http.options.root = AppConfig.api_url;

require('./services/interceptors');
require('./router');