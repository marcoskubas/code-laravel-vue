<?php 

namespace CodeLaravelVue\Jwt;

use \Tymon\JWTAuth\Manager as JwtManager;

class Manager extends JwtManager {

	/**
     * Refresh a Token and return a new Token.
     *
     * @param  \Tymon\JWTAuth\Token  $token
     * @param  bool  $forceForever
     * @param  bool  $resetClaims
     *
     * @return \Tymon\JWTAuth\Token
     */
    public function refresh(\Tymon\JWTAuth\Token $token, $forceForever = false, $resetClaims = false)
    {
    	$this->setRefreshFlow();
        return parent::refresh($token, $forceForever, $resetClaims);
    }

}