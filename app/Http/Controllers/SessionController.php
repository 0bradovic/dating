<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class SessionController extends Controller
{
    
    public function refreshToken()
    {
        $token = JWTAuth::getToken();
        $new_token = JWTAuth::refresh($token);
        
        return $new_token;
    }

}
