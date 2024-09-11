<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetSuccess;

class ForgotPasswordController extends Controller
{

    public function forgot_password() {
        return view('forgot_password');
    }
    


    public function forgot_passwordd(Request $request)
    {
        if (empty($request->email) && empty($request->unique_id)) {
            return back()->with('error', 'Input can\'t be empty');
        }
        
        // Unique Id verification
        $uniqueidverify = User::where('unique_id', '=', $request->unique_id)->first();

        if (!$uniqueidverify) {
            return back()->with('error', 'Matric No. does\'t match our record!');
        }
        

        $emailverify = User::where('email', '=', $request->email)->first();

        if (!$emailverify) {
            return back()->with('error', 'Email does\'t match our record!');
        }
        $request->validate([
            'unique_id' => 'required',
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // if ($status === Password::RESET_LINK_SENT) {
        //     return back()->with(['status', trans($status)]);
        // }

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Your reset password link has been sent to your mail!');
        }

        return back()->with(['error', trans($status)]);
        
        
    }







    public function reset_password(Request $request, string $token = null) {
    
    $tokens = $request->token;

        return view('reset_password', ['token' => $token, 'unique_id' => $request->unique_id], compact('tokens'));
    }
    
    

    public function reset_passwordd(Request $request)
    {
        
        // Check if any of the required fields are empty
    if (empty($request->token) || empty($request->email) || empty($request->password) || empty($request->unique_id)) {
        return back()->with('error', __('Input can\'t be empty'));
    }
    
    // Unique Id verification
        $uniqueidverify = User::where('unique_id', '=', $request->unique_id)->first();

        if (!$uniqueidverify) {
            return back()->with('error', 'Matric No. does\'t match our record!');
        }
        
        // Password Confirmation
        $passwordconfirmation = $request->password == $request->password_confirmation;

        if (!$passwordconfirmation) {
            return back()->with('error', 'Password does\'nt match!');
        }

    // Validate the request
    $request->validate([
        'token' => 'required',
       'email' => 'required|email',
       'unique_id' => 'required',
        'password' => 'required|min:5|confirmed',
    ]);

    // Attempt to reset the password
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
            
            
            // Send the password reset success email
          Mail::to($user->email)->send(new PasswordResetSuccess($user));
            
            
        }
    );

    // Check the status and return the appropriate response
    if ($status === Password::PASSWORD_RESET) {
        return redirect('/')->with('success', 'Password successful changed !!!');
    }

    return back()->with('error', __($status));
    
    }



}
