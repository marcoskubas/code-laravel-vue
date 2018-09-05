import store from '../store/store';
import JwtToken from './jwtToken';
import AppConfig from './appConfig';

Vue.http.interceptors.push((request, next) => {
	request.headers.set('Authorization', JwtToken.getAuthorizationHeader());
	next();
});

Vue.http.interceptors.push((request, next) => {
	next((response) => {
		if(response.status === 401){ //token expirado
			return JwtToken.refreshToken()
				.then(() => {
					return Vue.http(request);
				})
				.catch(() => {
					store.dispatch('clearAuth');
					window.location.href = AppConfig.login_url;
				});
		}
	});
});