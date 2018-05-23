import LoginComponent from './components/Login.vue';
import AppComponent from './components/App.vue';

require('materialize-css');
/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');

let VueRouter = require('vue-router');
const router  = new VueRouter;

router.map({
	'/login' : {
		name : 'auth.login',
		component : LoginComponent
	}
});

router.start({
	components : {
		'app' : AppComponent
	}
}, 'body');
