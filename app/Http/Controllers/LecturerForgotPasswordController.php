<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class LecturerForgotPasswordController extends Controller
{
    


    public function forgot_password() {
        return view('/lecturer/forgot_password');
    }
    

    public function forgot_passwordd(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['status', trans($status)]);
        }

        return back()->with(['error', trans($status)]);
        
    }







    public function reset_password(Request $request, string $token = null) {

        return view('/lecturer/reset_password', ['token' => $token, 'email' => $request->email]);
    }
    

    public function reset_passwordd(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),

            function (Lecturer $lecturer, string $password)
            {
                $lecturer->forceFill([
                    'password' => Hash::make($password),
                    // 'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $lecturer->save();

                event(new PasswordReset($lecturer));

            }

        );

        // return $status ===  Password::PASSWORD_RESET
        //     ? redirect()->route('/lecturer')->with(['status' => _($status)])
        //     : back()->with(['email' => _($status)]);

            if ($status === Password::PASSWORD_RESET) {
                return redirect()->route('/lecturer')->with(['status', trans($status)]);
            }
    
            return back()->with(['error', trans($status)]);
        
    }




}
