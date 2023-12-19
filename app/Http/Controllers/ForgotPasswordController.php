<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class ForgotPasswordController extends Controller
{

    public function forgot_password() {
        return view('forgot_password');
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

        return view('reset_password', ['token' => $token, 'unique_id' => $request->unique_id]);
    }
    

    public function reset_passwordd(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'unique_id' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $status = Password::reset(
            $request->only('unique_id', 'password', 'password_confirmation', 'token'),

            function (User $user, string $password)
            {
                $user->forceFill([
                    'password' => Hash::make($password),
                    // 'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));

            }

        );

        // return $status ===  Password::PASSWORD_RESET
        //     ? redirect()->route('/')->with(['status' => _($status)])
        //     : back()->with(['unique_id' => _($status)]);

            if ($status === Password::PASSWORD_RESET) {
                return redirect()->route('/')->with(['status', trans($status)]);
            }
    
            return back()->with(['error', trans($status)]);
        
    }




}
