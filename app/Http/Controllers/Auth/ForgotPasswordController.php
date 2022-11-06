<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    
    // Validate forgot password page
    protected function validateEmail(Request $request)
    {
        $this->validate($request,
        [
            'email' => ['required', 'string', 'email', 'max:255'],
        ],
        [
            'email.required' => 'Šis laukas yra privalomas',
        ]
    );
    }

    use SendsPasswordResetEmails;
}
