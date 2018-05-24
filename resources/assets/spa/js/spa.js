require('materialize-css');
window.Vue = require('vue');
require('vue-resource');
Vue.http.options.root = "http://localhost:8000/api";

require('./router');

window.localStorage.setItem('name', 'value');
window.localStorage.setItem('name', 'alterValue');
window.localStorage.clear();
window.localStorage.removeItem('name');
