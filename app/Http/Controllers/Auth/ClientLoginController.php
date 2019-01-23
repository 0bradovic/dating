<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Client;
use App\ClientProfilePhoto;
use App\ClientPhoto;
use App\ClientCoverPhoto;
use Tymon\JWTAuth\Facades\JWTAuth;


class ClientLoginController extends Controller
{
    //

    public function showLoginForm()
    {
      return view('auth.client-login');
    }

    public function login(Request $request)
    {
     $user= Client::where('email',$request->email)->first();
     if ($user && \Hash::check($request->password, $user->password)) // The passwords match...
     {
         $token = $this->getToken($user);
         
         $response=['auth_token'=>$token, 'status'=>true];
         return $response;
              
     }
      //return redirect()->back()->withInput($request->only('username', 'remember'));
      $response=['status'=>false];
      return $response;
    }

    public function getClientByToken()
    {
        $clientPayload = JWTAuth::getPayload(JWTAuth::getToken());

        $client = Client::where('id',$clientPayload['client_id'])->with('interests')->with('clientPhotos')->with('clientPreferance')->first();

        $clientProfilePhoto = ClientProfilePhoto::where('client_id', $client->id)->first();

        if($clientProfilePhoto)
        {
            $clientPP = ClientPhoto::find($clientProfilePhoto->client_photo_id);
            $client->profile_photo = $clientPP;
        }
        else 
        {
            $client->profile_photo=null;
        }

        $clientCoverPhoto = ClientCoverPhoto::where('client_id', $client->id)->first();

        if($clientCoverPhoto)
        {
            $clientCP = ClientPhoto::find($clientCoverPhoto->client_photo_id);
            $client->cover_photo = $clientCP;
        }
        else 
        {
            $client->cover_photo=null;
        }

        return json_encode($client);

    }

}
