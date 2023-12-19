<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AdminForgotPasswordController extends Controller
{
    



    public function forgot_password() {
        return view('/lecturer/admin/forgot_password');
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

        return view('/lecturer/admin/reset_password', ['token' => $token, 'email' => $request->email]);
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

            function (Admin $admin, string $password)
            {
                $admin->forceFill([
                    'password' => Hash::make($password),
                    // 'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $admin->save();

                event(new PasswordReset($admin));

            }

        );

        // return $status ===  Password::PASSWORD_RESET
        //     ? redirect()->route('/lecturer/admin')->with(['status' => _($status)])
        //     : back()->with(['email' => _($status)]);

            if ($status === Password::PASSWORD_RESET) {
                return redirect()->route('/lecturer/admin')->with(['status', trans($status)]);
            }
    
            return back()->with(['error', trans($status)]);
        
    }




}
