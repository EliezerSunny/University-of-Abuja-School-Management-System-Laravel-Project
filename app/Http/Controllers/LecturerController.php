<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Models\ClearedClearance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class LecturerController extends Controller
{
    public function lecturer_login(Request $request) {

        if (empty($request['email']) || empty($request['password'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::guard('lecturer')->attempt($credentials)) {
            $request->session()->regenerate();
            
                return redirect('/lecturer/dashboard')->with('success', 'Successfully logged in!');
            
        }else{

        return back()->with('error', 'Incorrect credentials!');
        }

    }


    public function logout(Request $request): RedirectResponse
    {
        if (Auth::guard('lecturer')->check()) {
            
        Auth::guard('lecturer')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

        return redirect('/lecturer')->with('success', 'Successfully logged out!!!');

        }
        

    }



    // change_picture Controller
    public function change_picture(Request $request) {

        if (Auth::guard('lecturer')->check()) {

        $lecturer = Auth::guard('lecturer')->user();

        if (empty($request['name']) || empty($request['picture'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
            'name' => ['required', 'min:1'],
            'picture' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move(public_path('assets/images/lecturers'), $newImageName);
        $requests['picture'] = $newImageName;

        $lecturer->update($requests);

        return back()->with('success', 'Picture Successfully Changed!');
    }

}
    // change_picture Controller End


    // change_email Controller End
    public function change_email(Request $request): RedirectResponse 
    {
        if (Auth::guard('lecturer')->check()) {

        $lecturer = Auth::guard('lecturer')->user();

        if (empty($request['email']) || empty($request['school_email'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $incomingFields = $request->validate([
            'email' => ['required', 'email'],
            'school_email' => ['required', 'email'],
        ]);

        $incomingFields['email'] = strip_tags($incomingFields['email']);
        $incomingFields['school_email'] = strip_tags($incomingFields['school_email']);
        $lecturer->update($incomingFields);

        return back()->with('success', 'Email successfully updated!');
    }

}
    // change_email Controller End


    // change_password Controller End
    public function change_password(Request $request): RedirectResponse 
    {
        if (Auth::guard('lecturer')->check()) {

        $lecturer = Auth::guard('lecturer')->user();

        if (empty($request['password']) || empty($request['current_password']) || empty($request['password_confirmation'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        if ($request['password'] != $request['password_confirmation']) {
            return back()->with('error', 'New password and confirm password must match!');
        }

        $incomingFields = $request->validate([
            'password' => ['required', 'min:5', 'max:200', 'confirmed'],
            'current_password' => ['required'],
            'password_confirmation' => ['required'],
        ]);


        if (Hash::check($incomingFields['current_password'], $lecturer->password)) {



            $incomingFields['password'] = bcrypt($incomingFields['password']);
            $lecturer->update($incomingFields);

        return back()->with('success', 'Password successfully Changed!');
            

        }else{

        return back()->with('error', 'Current password incorrect!');
        }

        
    }

}
    // change_password Controller End




    // clearance Controller End
    public function clearance_form(Request $request): RedirectResponse 
    {
        if (Auth::guard('lecturer')->check()) {

        $lecturer = Auth::guard('lecturer')->user();

        if (empty($request['student_clearance_id'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $incomingFields = $request->validate([
            'faculty_id' => ['required'],
            'department_id' => ['required'],
            'lecturer_id' => ['required'],
            // 'admin_id' => ['required'],
            'section_id' => ['required'],
            'user_id' => ['required'],
            'student_clearance_id' => ['required'],
        ]);


        $incomingFields['status'] = 'Unapprove';
        // $incomingFields['admin_id'] = 1;

        // checking if submission already exists for the student
        $existingSubmission = ClearedClearance::where('user_id', '=', $incomingFields['user_id'])->first();

        if ($existingSubmission) {
            return back()->with('error', 'You\'ve already submitted this student clearance.');
        } else {


        // $incomingFields['lecturer_id'] = Auth::guard('lecturer')->user()->id;
        // $incomingFields['admin_id'] = Auth::guard('lecturer')->user()->id;
        $lecturer = ClearedClearance::create($incomingFields);

        return back()->with('success', 'Clearance successfully submitted!!!');
    }
}


}







public function delete_clearance_form(ClearedClearance $students) {

    if (Auth::guard('lecturer')->check()) {
            
            $students->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}
    // clearance Controller End



    
}
