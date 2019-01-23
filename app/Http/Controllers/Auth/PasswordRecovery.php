<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Client;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;

class PasswordRecovery extends Controller
{
    //
    public function sendMailForRecoveryClient(Request $request)
    {
        $clientarevitj = Client::where('email', $request->email)->first();

        if($clientarevitj==null) return "Wrong Email";

        Mail::to($clientarevitj->email)->send(new ForgotPassword());

    }

}
