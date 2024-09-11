<?php

namespace App\Http\Controllers;

//use Password;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminPasswordResetSuccess;

class AdminForgotPasswordController extends Controller
{

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
    protected function broker()
    {
        return Password::broker('admins');
    }



    public function forgot_password() {
        return view('/lecturer/admin/forgot_password');
    }
    

    public function forgot_passwordd(Request $request)
    {
    
    
    if (empty($request->email)) {
            return back()->with('error', 'Input can\'t be empty');
        }
        
        
        // Validate the email input first
    $request->validate([
        'email' => 'required|email'
    ]);

    // Check if the email exists in the Admin table
    $emailverify = Admin::where('email', $request->email)->first();

    if (!$emailverify) {
        return back()->with('error', 'Email doesn\'t match our records!');
    }

    // Attempt to send the password reset link
    $status = Password::broker('admins')->sendResetLink(
        $request->only('email')
    );

    // Check the status of the password reset link sending
    if ($status === Password::RESET_LINK_SENT) {
        return back()->with('success', 'A reset password link has been sent to your email!');
    }

    // Handle the failure case
    return back()->with('error', trans($status));
        
        
    }







    public function reset_password(Request $request, string $token = null) {
    
    $tokens = $request->token;

        return view('/lecturer/admin/reset_password', ['token' => $token, 'email' => $request->email], compact('tokens'));
    }
    

    public function reset_passwordd(Request $request)
    {
    
    // Check if any of the required fields are empty
    if (empty($request->token) || empty($request->email) || empty($request->password)) {
        return back()->with('error', __('Input can\'t be empty'));
    }
        
        // Validate the request input
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:5|confirmed',
    ]);

    // Attempt to reset the password
    $status = Password::broker('admins')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (Admin $admin, string $password) {
            $admin->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            $admin->save();

            event(new PasswordReset($admin));

            // Send the password reset success email
            Mail::to($admin->email)->send(new AdminPasswordResetSuccess($admin));
        }
    );

    // Check the status and return the appropriate response
    if ($status === Password::PASSWORD_RESET) {
        return redirect('/lecturer/admin')->with('success', 'Password successfully changed!');
    }

    return back()->with('error', __($status));
    
        
    }




}
