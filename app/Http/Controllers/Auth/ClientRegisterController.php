<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class ClientRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

  
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegisterForm(){

        return view('auth.client-register');

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Client
     */
    
    public function register(Request $request){

        $this->validate($request,[
            'username' => 'required|string|max:255|unique:clients',
            'email' => 'required|email|unique:clients',
            'gender' => 'required|string',
            'password' => 'required|confirmed',
            'date_of_birth' => 'required'
        ]);

        $client = Client::create([
            'username' => $request->username,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => bcrypt($request->password),
            'date_of_birth' => Carbon::parse($request->date_of_birth),
            ]);
            
            $user = Client::where('email', $request->email)->first();
            if($user)
            {
            $token = $this->getToken($user); 
            $response=['auth_token'=>$token, 'status'=>true];
            $this->sendMailForWelcomeClient($user->id);
            return $response;
            }
            else
            $response=['status'=>false];
            return $response;
   

    }

    public function clientUpdateProfile(Request $request)
    {
        $client = new Client();

        $clientPayload = JWTAuth::getPayload(JWTAuth::getToken());

        $request['id'] =  $clientPayload['client_id'];

        $request['date_of_birth'] = Carbon::parse($request['date_of_birth']);
        
        return $client->updateClient($request);

    }

}
