<?php

namespace App\Http\Controllers\Auth;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class EmployeeRegisterController extends Controller
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
    protected $redirectTo = '/home';

    public function showRegisterForm(){

        return view('auth.employee-register');

    }

    public function register(Request $request){

        $this->validate(request(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:employees',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:6|confirmed',
            'nickname' => 'required|string|max:255',
            'looking_for' => 'required|string',
            'date_of_birth' => 'required|date',
            'language' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'hair_color' => 'required|string',
            'eye_color' => 'required|string',
            'gender' => 'required|string',
            'smoking' => 'required|string',
            'drinking' => 'required|string',
            'relationship' => 'required|string',
            'children' => 'required|string',
            'education' => 'required|string',
            'nationality' => 'required|string',
            'occupation' => 'required|string',
            'heading' => 'required|string',
            'about' => 'required|string',
            'credit_card_number' => 'required|string',
            'employee_type_id' => 'required|integer'
        ]);

        $employee = Employee::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'nickname' => $request->nickname,
            'looking_for' => $request->looking_for,
            'date_of_birth' => $request->date_of_birth,
            'language' => $request->language,
            'country' => $request->country,
            'city' => $request->city,
            'height' => $request->height,
            'weight' => $request->weight,
            'hair_color' => $request->hair_color,
            'eye_color' => $request->eye_color,
            'gender' => $request->gender,
            'smoking' => $request->smoking,
            'drinking' => $request->drinking,
            'relationship' => $request->relationship,
            'children' => $request->children,
            'education' => $request->education,
            'nationality' => $request->nationality,
            'occupation' => $request->occupation,
            'heading' => $request->heading,
            'about' => $request->about,
            'credit_card_number' => $request->credit_card_number,
            'employee_type_id' => $request->employee_type_id
        ]);

        auth('employee')->login($employee);

        return redirect()->intended(route('employee.dashboard'));

    }
}
