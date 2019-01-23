<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use JWTAuth;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Client;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function json($data, $code = 200){
        $obj = [
            "data" => $data,
            "status" => $code
        ];
        
        return response()->json($obj);
    }

    public function getToken($user)
    {
        $token = null;
        
        
        //$credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::fromUser($user)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'Password or email is invalid',
                    'token'=>$token
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'Token creation failed',
            ]);
        }
        return $token;
    }

    
    public function sendMailForWelcomeClient($client_id)
    {
        $clientarevitj = Client::find($client_id);

        Mail::to($clientarevitj->email)->send(new Welcome());
    }
    
}
