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

        if (empty($request['password']) || empty($request['current_password']) || empty($request['confirm_password'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        if ($request['password'] != $request['confirm_password']) {
            return back()->with('error', 'New password and confirm password must match!');
        }

        $incomingFields = $request->validate([
            'password' => ['required', 'min:5', 'max:200'],
            'current_password' => ['required'],
            'confirm_password' => ['required'],
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




// course reg testing

    
    public function add_course_reg(Request $request)
{
    if (Auth::guard('web')->check()) {

        $request->validate([
            'faculty_id' => ['required', 'array'], // Array for multiple courses
            'department_id' => ['required', 'array'],
            'level_id' => ['required', 'array'],
            'section_id' => ['required', 'array'],
            'semester_id' => ['required', 'array'],
            'course_id' => ['required', 'array'], // Array of selected course IDs
            'course_unit' => ['required', 'array'], // Array of course units
        ], 
        [
    'faculty_id.required' => 'Faculty ID is required.',
    'department_id.required' => 'Department ID is required.',
    'level_id.required' => 'Level ID is required.',
    'section_id.required' => 'Section ID is required.',
    'semester_id.required' => 'Semester ID is required.',
    'course_id.required' => 'You must select at least one course.',
    'course_unit.required' => 'Course unit is required for each course.',
]
        );

        $userId = Auth::guard('web')->user()->id;
        
        $selectedCourseIds = $request->course_id; // Array of course IDs
        $selectedCourseUnits = $request->course_unit; // Array of course units

        // Loop through the selected courses
        foreach ($selectedCourseIds as $index => $courseId) {
            
            $facultyId = $request->faculty_id[$courseId];
            $departmentId = $request->department_id[$courseId];
            $levelId = $request->level_id[$courseId];
            $sectionId = $request->section_id[$courseId];
            $semesterId = $request->semester_id[$courseId];
            $courseUnit = $selectedCourseUnits[$courseId]; // Course unit for this course

            // Check if the course is already registered by the user
            $courseExist = CourseReg::where('user_id', $userId)
                ->where('course_id', $courseId)
                ->exists();

            if ($courseExist) {
                return back()->with('error', 'You have already selected one of the courses.');
            }

            // Check total course units for the semester and level
            $totalFirstSemesterUnits = CourseReg::where('user_id', $userId)
                ->where('level_id', $levelId)
                ->where('section_id', $sectionId)
                ->where('semester_id', 1)
                ->sum('course_unit');

            $totalSecondSemesterUnits = CourseReg::where('user_id', $userId)
                ->where('level_id', $levelId)
                ->where('section_id', $sectionId)
                ->where('semester_id', 2)
                ->sum('course_unit');

            // Check if course unit limit is exceeded
            if (($semesterId == 1 && $totalFirstSemesterUnits + $courseUnit > 25) || ($semesterId == 2 && $totalSecondSemesterUnits + $courseUnit > 25)) {
                return back()->with('error', 'NOTE: You can\'t select more than 25 course units per semester.');
            }

            // Prepare data to save
            $courseRegData = [
                'user_id' => $userId,
                'faculty_id' => $facultyId,
                'department_id' => $departmentId,
                'level_id' => $levelId,
                'section_id' => $sectionId,
                'semester_id' => $semesterId,
                'course_id' => $courseId,
                'course_unit' => $courseUnit,
                'unique_id' => rand(time(), 1000000),
                'status' => 'Active',
            ];

            // Save each course registration
            CourseReg::create($courseRegData);
        }

        return back()->with('success', 'Courses registered successfully!');
    }

    return back()->with('error', 'User not authenticated.');
}
    
// testing ends




/*
    // Course Reg Controller
    public function add_course_reg(Request $request) {

        if (Auth::guard('web')->check()) {



        $requests = $request->validate([
            'faculty_id' => ['required', 'min:1'],
            'department_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'section_id' => ['required', 'min:1'],
            'semester_id' => ['required', 'min:1'],
            'course_id' => ['required', 'min:1'],
            'course_unit' => ['required', 'min:1'],
        ]);

        

        $requests['user_id'] = Auth::guard('web')->user()->id;
        $requests['unique_id'] = rand(time(), 1000000);
        $requests['status'] = 'Active';

        $userId = Auth::guard('web')->user()->id;
        
        $requests['course_unit'] = $request->course_unit;

        $courseexist = CourseReg::where('user_id', $userId)->where('course_id', $requests['course_id'])->exists();

        if ($courseexist) {
            return back()->with('error', 'You have already selected one of the course.');
        }

        $fcourse_unit = CourseReg::where('user_id', '=', $userId)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->sum('course_unit');
        $scourse_unit = CourseReg::where('user_id', '=', $userId)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->sum('course_unit');

        if ($fcourse_unit >= 25) {
            return back()->with('error', 'NOTE: You can\'t select more than 25 unit course.');
        }

        if ($scourse_unit >= 25) {
            return back()->with('error', 'NOTE: You can\'t select more than 25 unit course.');
        }
        
        // $combined_course = $request['faculty_id'] . $request['department_id'] . $request['level_id'] . $request['section_id'] . $request['semester_id'] . $request['course_id'] . $request['course_unit'];
 
        // $combined_course = $request['course_id'];
 

            // $allcourses = explode(',', $combined_course);
        

        // dd($allcourses);

        

            //
            
         //   $enroll_no = $request->enroll_no;
       //     $student_name = $request->student_name;
          //  $present= $request->present;

            foreach($enroll_no as $key => $no)
             {
               $input['enroll_no'] = $no;
               $input['student_name '] =            
               $student_name[$key];
               $input['present'] = $present[$key];
 
               CourseReg::create($requests);

}
            
            //

                CourseReg::create($requests);
  

            


        return back()->with('success', 'Course Reg. Successfully Added!');
    }

}
*/


public function change_course_reg_details(Request $request, CourseReg $courseregs) {

    if (Auth::guard('web')->check()) {

    $requests = $request->validate([
            'faculty_id' => ['required', 'min:1'],
            'department_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'section_id' => ['required', 'min:1'],
            'semester_id' => ['required', 'min:1'],
            'course_id' => ['required', 'min:1'],
            'course_unit' => ['required', 'min:1'],
            // 'user_id' => ['required', 'min:1'],
    ]);

    $requests['faculty_id'] = strip_tags($requests['faculty_id']);
    $requests['department_id'] = strip_tags($requests['department_id']);
    $requests['level_id'] = strip_tags($requests['level_id']);
    $requests['section_id'] = strip_tags($requests['section_id']);
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
            'section_id' => ['required'],
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

        $studentLevel = User::where('section_id', $currentSession)->get();

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
