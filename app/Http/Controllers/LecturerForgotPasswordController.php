<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Lecturer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\lecturerPasswordResetSuccess;

class LecturerForgotPasswordController extends Controller
{
    
    
    protected function guard()
    {
        return Auth::guard('lecturer');
    }
    
    protected function broker()
    {
        return Password::broker('lecturers');
    }
    


    public function forgot_password() {
        return view('/lecturer/forgot_password');
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

    // Check if the email exists in the Lecturer table
    $emailverify = Lecturer::where('email', $request->email)->first();

    if (!$emailverify) {
        return back()->with('error', 'Email doesn\'t match our records!');
    }

    // Attempt to send the password reset link
    $status = Password::broker('lecturers')->sendResetLink(
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

        return view('/lecturer/reset_password', ['token' => $token, 'email' => $request->email], compact('tokens'));
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
    $status = Password::broker('lecturers')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (Lecturer $lecturer, string $password) {
            $admin->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            $lecturer->save();

            event(new PasswordReset($lecturer));

            // Send the password reset success email
            Mail::to($lecturer->email)->send(new LecturerPasswordResetSuccess($lecturer));
        }
    );

    // Check the status and return the appropriate response
    if ($status === Password::PASSWORD_RESET) {
        return redirect('/lecturer')->with('success', 'Password successfully changed!');
    }

    return back()->with('error', __($status));
    
    
    
    }




}
