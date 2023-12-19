<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CourseReg;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\StudentClearance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    public function login(Request $request) {

        if (empty($request['unique_id']) || empty($request['password'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $request->validate([
            'unique_id' => 'required',
            'password' => 'required',
        ]);


        $credentials = [
            'unique_id' => $request->unique_id,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            
                return redirect('/dashboard')->with('success', 'Successfully logged in!');
            
        } else{

        return back()->with('error', 'Incorrect credentials!');
        }

    }



    public function logout(Request $request): RedirectResponse
    {
        if (Auth::guard('web')->check()) {
            
        Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Successfully logged out!!!');

        }

    }



    // change_picture Controller
    public function change_picture(Request $request) {

        if (Auth::guard('web')->check()) {

        $user = Auth::guard('web')->user();

        if (empty($request['name']) || empty($request['picture'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
            'name' => ['required', 'min:1'],
            'picture' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move(public_path('assets/images/students'), $newImageName);
        $requests['picture'] = $newImageName;

        $user->update($requests);

        return back()->with('success', 'Picture Successfully Changed!');
    }

}
    // change_picture Controller End


    // change_email Controller End
    public function change_email(Request $request): RedirectResponse 
    {
        if (Auth::guard('web')->check()) {

        $user = Auth::guard('web')->user();

        if (empty($request['email']) || empty($request['school_email'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $incomingFields = $request->validate([
            'email' => ['required', 'email'],
            'school_email' => ['required', 'email'],
        ]);

        $unique_email = User::where('email', $incomingFields['email'])->orWhere('school_email', $incomingFields['school_email'])->first();

        if ($unique_email) {
            return back()->with('error', 'Email already exist! Change inputs to make changes');
        }

        $incomingFields['email'] = strip_tags($incomingFields['email']);
        $incomingFields['school_email'] = strip_tags($incomingFields['school_email']);
        $user->update($incomingFields);

        return back()->with('success', 'Email successfully updated!');
    }

}
    // change_email Controller End


    // change_password Controller End
    public function change_password(Request $request): RedirectResponse 
    {
        if (Auth::guard('web')->check()) {

        $user = Auth::guard('web')->user();

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


        if (Hash::check($incomingFields['current_password'], $user->password)) {

            $incomingFields['password'] = bcrypt($incomingFields['password']);
            $user->update($incomingFields);

        return back()->with('success', 'Password successfully Changed!');
            

        }else{

        return back()->with('error', 'Current password incorrect!');
        }

        
    }

}
    // change_password Controller End




    // Course Reg Controller
    public function add_course_reg(Request $request) {

        if (Auth::guard('web')->check()) {



        $requests = $request->validate([
            'faculty_id' => ['required', 'min:1'],
            'department_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'session_id' => ['required', 'min:1'],
            'semester_id' => ['required', 'min:1'],
            'course_id' => ['required', 'min:1'],
            'course_unit' => ['required', 'min:1'],
        ]);

        

        $requests['user_id'] = Auth::guard('web')->user()->id;
        $requests['unique_id'] = rand(time(), 1000000);
        $requests['status'] = 'Active';

        $userId = Auth::guard('web')->user()->id;

        $courseexist = CourseReg::where('user_id', $userId)->where('course_id', $requests['course_id'])->exists();

        if ($courseexist) {
            return back()->with('error', 'You have already selected one of the course.');
        }

        $fcourse_unit = CourseReg::where('user_id', '=', $userId)->where('level_id', '=', 1)->where('session_id', '=', 1)->where('semester_id', '=', 1)->sum('course_unit');
        $scourse_unit = CourseReg::where('user_id', '=', $userId)->where('level_id', '=', 1)->where('session_id', '=', 1)->where('semester_id', '=', 2)->sum('course_unit');

        if ($fcourse_unit >= 25) {
            return back()->with('error', 'NOTE: You can\'t select more than 25 unit course.');
        }

        if ($scourse_unit >= 25) {
            return back()->with('error', 'NOTE: You can\'t select more than 25 unit course.');
        }
        
        // $combined_course = $request['faculty_id'] . $request['department_id'] . $request['level_id'] . $request['session_id'] . $request['semester_id'] . $request['course_id'] . $request['course_unit'];
 
        // $combined_course = $request['course_id'];
 

            // $allcourses = explode(',', $combined_course);
        

        // dd($allcourses);

        

            // foreach ($requests as $value) {

                // $values = new CourseReg();
                // $values->faculty_id = $value;
                // $values->department_id = $value;
                // $values->level_id = $value;
                // $values->session_id = $value;
                // $values->semester_id = $value;
                // $values->course_id = $value;
                // $values->course_unit = $value;

                CourseReg::create($requests);
            // }

            


        return back()->with('success', 'Course Reg. Successfully Added!');
    }

}



public function change_course_reg_details(Request $request, CourseReg $courseregs) {

    if (Auth::guard('web')->check()) {

    $requests = $request->validate([
            'faculty_id' => ['required', 'min:1'],
            'department_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'session_id' => ['required', 'min:1'],
            'semester_id' => ['required', 'min:1'],
            'course_id' => ['required', 'min:1'],
            'course_unit' => ['required', 'min:1'],
            // 'user_id' => ['required', 'min:1'],
    ]);

    $requests['faculty_id'] = strip_tags($requests['faculty_id']);
    $requests['department_id'] = strip_tags($requests['department_id']);
    $requests['level_id'] = strip_tags($requests['level_id']);
    $requests['session_id'] = strip_tags($requests['session_id']);
    $requests['semester_id'] = strip_tags($requests['semester_id']);
    $requests['course_id'] = strip_tags($requests['course_id']);
    $requests['course_unit'] = strip_tags($requests['course_unit']);
    // $requests['user_id'] = strip_tags($requests['user_id']);

    $courseregs->update($requests);

    return back()->with('success', 'Successfully Updated!');
}

}



public function delete_course_reg(CourseReg $courses) {

    if (Auth::guard('web')->check()) {

        if (Auth::guard('web')->user()->id === $courses->user_id) {
            
            $courses->delete();
            return back()->with('success', 'Successfully Dropped!');
        }

    return back()->with('error', 'Something went wrong. Try again!');
}

return back()->with('error', 'Something went wrong. Try again!');

}

    // Course Reg Controller End




    // Clearance Controller End
    public function clearance_form(Request $request): RedirectResponse 
    {
        if (Auth::guard('web')->check()) {

        $user = Auth::guard('web')->user();

        if (empty($request['school_receipt']) || empty($request['student_result'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
            'name' => ['required'],
            'faculty_id' => ['required'],
            'department_id' => ['required'],
            'level_id' => ['required'],
            'session_id' => ['required'],
            'user_id' => ['required'],
            'school_receipt' => ['required', 'mimes:jpg,png,jpeg,pdf', 'max:1000000'],
            'student_result' => ['required', 'mimes:jpg,png,jpeg,pdf', 'max:1000000'],
        ]);


        // checking if submission already exists for the student
        $existingSubmission = StudentClearance::where('user_id', auth()->id())->first();

        if ($existingSubmission) {
            return back()->with('error', 'You have already submitted the form.');
        } else {


        $schoolReceipt = time() . '-' . 'feereceipt' . '-' . $request->name . '.' . $request->school_receipt->extension();
        $request->school_receipt->move(public_path('assets/images/students/receipt'), $schoolReceipt);
        $requests['school_receipt'] = $schoolReceipt;
        $studentResult = time() . '-'  . 'result' . '-' . $request->name . '.' . $request->student_result->extension();
        $request->student_result->move(public_path('assets/images/students/result'), $studentResult);
        $requests['student_result'] = $studentResult;
        $requests['status'] = 'Active';
        $clearance = StudentClearance::create($requests);

        return back()->with('success', 'Clearance submitted successfully!!!');

        }

    }

}
    // Clearance Controller End




    // Edit Clearance Controller End
    public function edit_clearance_form(Request $request, StudentClearance $StudentClearance): RedirectResponse 
    {
        if (Auth::guard('web')->check()) {

        $user = Auth::guard('web')->user();

        if (empty($request['school_receipt']) || empty($request['student_result'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $studentClearance = StudentClearance::where('user_id', auth()->user()->id);

        $requests = $request->validate([
            'school_receipt' => ['required', 'mimes:jpg,png,jpeg,pdf', 'max:1000000'],
            'student_result' => ['required', 'mimes:jpg,png,jpeg,pdf', 'max:1000000'],
        ]);


        // checking if submission already exists for the student
        // $existingSubmission = StudentClearance::where('user_id', auth()->id())->first();

        // if ($existingSubmission) {
        //     return back()->with('error', 'You have already submitted the form.');
        // } else {


        $schoolReceipt = time() . '-' . 'feereceipt' . '-' . Auth::guard('web')->user()->name . '.' . $request->school_receipt->extension();
        $request->school_receipt->move(public_path('assets/images/students/receipt'), $schoolReceipt);
        $requests['school_receipt'] = $schoolReceipt;
        $studentResult = time() . '-'  . 'result' . '-' . Auth::guard('web')->user()->name . '.' . $request->student_result->extension();
        $request->student_result->move(public_path('assets/images/students/result'), $studentResult);
        $requests['student_result'] = $studentResult;
        $studentClearance->update($requests);

        return back()->with('success', 'Clearance updated successfully!!!');

        }

    // }

}
    // Edit Clearance Controller End






    // Session level

    public function getCurrentSession() {
        $currentYear = date('Y');
        $nextYear = $currentYear +1;

        return $currentYear . '/' . $nextYear;
    }
    

    public function incrementStudentLevels(Request $request) {

        if (Auth::guard('web')->check()) {

        $currentSession = $this->getCurrentSession();

        $studentLevel = User::where('session_id', $currentSession)->get();

        DB::transaction(function () use ($studentLevel) {
            foreach ($studentLevel as $studentLevels) {
                $studentLevels->level_id += 1;
                $studentLevels->save();
            }
        });


        return back()->with('success', 'Student Level successfully updated!!!');
    }

    }

    // Session level change



}
