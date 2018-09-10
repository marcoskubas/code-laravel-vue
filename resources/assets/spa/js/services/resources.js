export class Jwt {
	static accessToken(email, password){
		return Vue.http.post('access_token', {
			'email' 	: email, 
			'password' 	: password
		});
	}

	static logout(){
		return Vue.http.post('logout');
	}

	static refreshToken(){
		return Vue.http.post('refresh_token');
	}
}

let User        = Vue.resource('user');
let Bank 	    = Vue.resource('banks');
let BankAccount = Vue.resource('bank_accounts{/id}');
let CategoryExpense = Vue.resource('category_expenses{/id}');
let CategoryRevenue = Vue.resource('category_revenues{/id}');

export {User, BankAccount, Bank, CategoryExpense, CategoryRevenue};