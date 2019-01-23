<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Admin;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //

    public function showLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required',
        'password' => 'required'
      ]);

      $user= Admin::where('email',$request->email)->first();
      if ($user && \Hash::check($request->password, $user->password)) // The passwords match...
      {
          $token = $this->getToken($user);
          
          $response=['auth_token'=>$token,'user'=> $user, 'status'=>true];
          return $response;
               
      }
 
       //return redirect()->back()->withInput($request->only('username', 'remember'));
       $response=['status'=>false];
       return $response;

      // // Attempt to log the user in
      // if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
      //   // if successful, then redirect to their intended location
      //   return redirect()->intended(route('admin.dashboard'));
      // }

      // // if unsuccessful, then redirect back to the login with the form data
      // return redirect()->back()->withInput($request->only('username', 'remember'));
    }

}
