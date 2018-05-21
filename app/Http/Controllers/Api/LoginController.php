<?php

namespace CodeLaravelVue\Http\Controllers\Api;

use CodeLaravelVue\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function accessToken(Request $request){
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        if($token == Auth::guard('api')->attempt($credentials)){
            return $this->sendLoginResponse($request, $token);
        }
    }

    protected function sendLoginResponse(Request $request, $token){

    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/admin/login');
        // return redirect(env('USER_ADMIN_LOGIN'));
    }
}
