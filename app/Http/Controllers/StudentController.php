<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email_l' => $request->email,
            'password_l' => $request->password
        ];

        if (Student::attempt($credentials)) {
            $request->session()->regenerated();

            return redirect('/lecture/dashboard')->with('success', 'Successfully logged in!');
        } else {
            return redirect('/lecture')->with('error', 'Incorrect credentials!');
        }
        
    }
}
