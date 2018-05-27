import LocalStorage from './services/localStorage';
import AppConfig from './services/appConfig';

require('materialize-css');
window.Vue = require('vue');
require('vue-resource');
Vue.http.options.root = AppConfig.api_url;

require('./services/interceptors');
require('./router');