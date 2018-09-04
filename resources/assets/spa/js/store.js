import JwtToken from './services/jwtToken';
import LocalStorage from './services/localStorage';
import {User} from './services/resources';
import Vuex from 'vuex';

const USER  = 'user';

const state = {
    user  : LocalStorage.getObject(USER),
    check : JwtToken.token != null
};

const mutations = {
  setUser(state, user){
      state.user = user
  }
};

export default new Vuex.Store({state, mutations});

/*
const afterLogin = function(response){
    this.user.check = true;
    User.get()
        .then((response) => {
            this.user.data = response.data;
        });
}

export default {
    user : {
        set data(value){
            if(!value){
                LocalStorage.remove(USER)
                this._data = null;
                return;
            }else{
                this._data = value;
                LocalStorage.setObject(USER, value);
            }
        },
        get data(){
            if(!this._data){
                this._data = LocalStorage.get(USER);
            }
            return this._data;
        },
        check : JwtToken.token ? true : false
    },
    login(email, password){
        return JwtToken.accessToken(email, password).then((response) => {
            let afterLoginContext = afterLogin.bind(this);
            afterLoginContext(response);
            return response;
        });
    },
    logout(){
        let afterLogout = (response) => {
            this.clearAuth();
            return response;
        };
        return JwtToken.revokeToken().then(afterLogout).catch(afterLogout);
    },
    clearAuth(){
        this.user.data  = null;
        this.user.check = false;
    }
}*/
