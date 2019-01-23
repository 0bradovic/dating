<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Employee;

class EmployeeLoginController extends Controller
{
    //

    public function showLoginForm()
    {
      return view('auth.employee-login');
    }

    public function login(Request $request)
    {
     $user= Employee::where('email',$request->email)->first();
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

    public function getemployeeByToken()
    {
        $employeePayload = JWTAuth::getPayload(JWTAuth::getToken());

        $employee = Employee::find($employeePayload['client_id'])->with('employeeInterests')->first();

        return json_encode($employee);

    }

}
