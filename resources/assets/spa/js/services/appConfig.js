import config from '../config';

let localConfig = {
	teste : 'teste'
};

const appConfig = Object.assign({}, config, localConfig);

export default appConfig;
