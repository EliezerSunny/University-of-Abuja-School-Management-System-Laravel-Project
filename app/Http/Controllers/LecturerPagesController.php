<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Result;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Lecturer;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ClearedClearance;
use App\Models\StudentClearance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class LecturerPagesController extends Controller
{
    public function email_notice() {
        return view('lecturer/verify')->with('error', 'You must verify your email first.');
    }

    public function email_verify(EmailVerificationRequest $request) {

        $request->fulfill();
        return redirect('lecturer/index')->with('success', 'Email verified! Please login.');
    }

    public function email_verifyy(Request $request) {

        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Verification link sent!');
    }




    public function lecturer_login() {

        return view('lecturer/index');
    }

    public function dashboard() {

        if (Auth::guard('lecturer')->check() && Auth::guard('lecturer')->user()->hasPermissionTo('dashboard_l')) {

        $lecturer = Lecturer::paginate(10);
        $student = User::paginate(10);
        $lecturers = Auth::guard('lecturer')->user()->department_id;
        $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
        $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->get();
        $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
        $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
        $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
        $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
        $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
        $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
        // $level500 = User::where('level', '=', 5)->latest()->get();
        // $level600 = User::where('level', '=', 6)->latest()->get();
        // $level700 = User::where('level', '=', 7)->latest()->get();
        $faculty = Faculty::paginate(10);
        $department = Department::paginate(10);
        $section = Section::paginate(10);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/dashboard', compact('lecturer', 'notificationn', 'notification', 'student', 'lecturerss', 'lecturersf', 'departmentf', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}



public function all_lecturers() {

    if (Auth::guard('lecturer')->check()) {

    $lecturer = Lecturer::paginate(10);
    $student = User::paginate(10);
    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
    $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
    $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
    $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
    $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
    // $level500 = User::where('level', '=', 5)->latest()->get();
    // $level600 = User::where('level', '=', 6)->latest()->get();
    // $level700 = User::where('level', '=', 7)->latest()->get();
    $faculty = Faculty::paginate(10);
    $department = Department::paginate(10);
    $section = Section::paginate(10);

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/all_lecturers', compact('lecturer', 'notificationn', 'notification', 'student', 'lecturerss', 'lecturersf', 'departmentf', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}



public function all_students() {

    if (Auth::guard('lecturer')->check()) {

    $lecturer = Lecturer::paginate(10);
    $student = User::paginate(10);
    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
    $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
    $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
    $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
    // $level500 = User::where('level', '=', 5)->latest()->get();
    // $level600 = User::where('level', '=', 6)->latest()->get();
    // $level700 = User::where('level', '=', 7)->latest()->get();
    $faculty = Faculty::paginate(10);
    $department = Department::paginate(10);
    $section = Section::paginate(10);

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/all_students', compact('lecturer', 'notificationn', 'notification', 'student', 'lecturerss', 'lecturersf', 'departmentf', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}



public function get_students(Request $request) 
    {

        if (Auth::guard('lecturer')->check()) {

            $lecturer = Lecturer::paginate(10);
    $student = User::paginate(10);
    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
    $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
    $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
    $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
    // $level500 = User::where('level', '=', 5)->latest()->get();
    // $level600 = User::where('level', '=', 6)->latest()->get();
    // $level700 = User::where('level', '=', 7)->latest()->get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();


            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        for ($i=0; $i < 20; $i++) { 
            $tokenss = Str::random(100);
        }

    
        $tokensss = base64_encode($tokenss);



        return view('/lecturer/get_students', compact('lecturer', 'tokensss', 'notificationn', 'notification', 'student', 'lecturerss', 'lecturersf', 'departmentf', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}





public function get_students_result(Request $request) 
    {

        if (Auth::guard('lecturer')->check()) {

            $lecturer = Lecturer::paginate(10);
    $student = User::paginate(10);
    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
    $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
    $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
    $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
    // $level500 = User::where('level', '=', 5)->latest()->get();
    // $level600 = User::where('level', '=', 6)->latest()->get();
    // $level700 = User::where('level', '=', 7)->latest()->get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);



        $faculty_idd = $request->input('faculty_id');
        $department_idd = $request->input('department_id');
        $section_idd = $request->input('section_id');
        $level_idd = $request->input('level_id');

    if ($faculty_idd == NULL || $department_idd == NULL || $section_idd == NULL || $level_idd == NULL) {
        return back()->with('error', 'Input can\'t be empty');
    }

    $studentss = User::where('faculty_id', '=', Auth::guard('lecturer')->user()->faculty_id)->where('department_id', '=', Auth::guard('lecturer')->user()->department_id)->where('section_id', '=', $section_idd)->where('level_id', '=', $level_idd)->get();
    $studentsss = User::where('faculty_id', '=', Auth::guard('lecturer')->user()->faculty_id)->where('department_id', '=', Auth::guard('lecturer')->user()->department_id)->where('section_id', '=', $section_idd)->where('level_id', '=', $level_idd)->paginate(20);

    for ($i=0; $i < 20; $i++) { 
        $tokenss = Str::random(100);
    }


    $tokensss = base64_encode($tokenss);

        return view('/lecturer/get_students_result', compact('lecturer', 'studentss', 'studentsss', 'tokensss', 'notificationn', 'notification', 'student', 'lecturerss', 'lecturersf', 'departmentf', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section', 'level'));

    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}





public function check_result(Request $request, Result $results,User $id,$name) 
    {

        if (Auth::guard('lecturer')->check()) {

            $lecturer = Lecturer::paginate(10);
    $student = User::paginate(10);
    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
    $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
    $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
    $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
    // $level500 = User::where('level', '=', 5)->latest()->get();
    // $level600 = User::where('level', '=', 6)->latest()->get();
    // $level700 = User::where('level', '=', 7)->latest()->get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);



        $fscourse_reg = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->get();
        $sscourse_reg = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->get();
    
        
    $ffscourse_reg = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->sum('weighted_grade_point');
    $ssscourse_reg = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->sum('weighted_grade_point');

    $fcourse_unit = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->with('course_regs', 'courses')->sum('course_unit');
    $scourse_unit = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->with(['course_regs', 'courses'])->sum('course_unit');


        return view('/lecturer/check_result', compact( 'fscourse_reg', 'sscourse_reg', 'ffscourse_reg', 'ssscourse_reg', 'fcourse_unit', 'scourse_unit', 'lecturer', 'studentss', 'id', 'name', 'notificationn', 'notification', 'student', 'lecturerss', 'lecturersf', 'departmentf', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section', 'level'));

    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}







    public function clearance_form(StudentClearance $students) {

        if (Auth::guard('lecturer')->check() && Auth::guard('lecturer')->user()->hasPermissionTo('clearance_form_l')) {

            $lecturer = Lecturer::paginate();
            $student = User::paginate();
            $lecturers = Auth::guard('lecturer')->user()->department_id;
            $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->get();
            $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
            $studentsss = StudentClearance::where('department_id', '=', $lecturers)->latest()->paginate();
            $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
            $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
            $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
            $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
            // $level500 = User::where('level', '=', 5)->latest()->get();
            // $level600 = User::where('level', '=', 6)->latest()->get();
            // $level700 = User::where('level', '=', 7)->latest()->get();
            $faculty = Faculty::paginate();
            $department = Department::paginate();
            $section = Section::paginate();
            $studentssss = ClearedClearance::where('department_id', '=', $lecturers)->latest()->paginate(50);
    
            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

            return view('lecturer/clearance_form', compact('lecturer', 'notificationn', 'notification', 'student', 'students', 'lecturerss', 'studentss', 'studentsss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section', 'studentssss'));
        } else {
            return back()->with('error', 'Unauthorized access!');
        }
        
    }

    public function clearance() {

        if (Auth::guard('lecturer')->check() && Auth::guard('lecturer')->user()->hasPermissionTo('clearance_l')) {

            $lecturer = Lecturer::paginate();
            $student = User::paginate();
            $lecturers = Auth::guard('lecturer')->user()->department_id;
            $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->get();
            $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
            $studentsss = StudentClearance::where('department_id', '=', $lecturers)->latest()->paginate();
            $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
            $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
            $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
            $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
            // $level500 = User::where('level', '=', 5)->latest()->get();
            // $level600 = User::where('level', '=', 6)->latest()->get();
            // $level700 = User::where('level', '=', 7)->latest()->get();
            $faculty = Faculty::paginate();
            $department = Department::paginate();
            $section = Section::paginate();

            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);
    
            return view('lecturer/clearance', compact('lecturer', 'notificationn', 'notification', 'student', 'lecturerss', 'studentss', 'studentsss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section'));
        } else {
            return back()->with('error', 'Unauthorized access!');
        }
        
    }

    public function change_email() {

        if (Auth::guard('lecturer')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $lecturers = Auth::guard('lecturer')->user()->department_id;
        $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->get();
        $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
        $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
        $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
        $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
        $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
        // $level500 = User::where('level', '=', 5)->latest()->get();
        // $level600 = User::where('level', '=', 6)->latest()->get();
        // $level700 = User::where('level', '=', 7)->latest()->get();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/settings_l', compact('lecturer', 'notificationn', 'notification', 'student', 'lecturerss', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}



    public function change_picture() {

        if (Auth::guard('lecturer')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $lecturers = Auth::guard('lecturer')->user()->department_id;
        $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->get();
        $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
        $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
        $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
        $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
        $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
        // $level500 = User::where('level', '=', 5)->latest()->get();
        // $level600 = User::where('level', '=', 6)->latest()->get();
        // $level700 = User::where('level', '=', 7)->latest()->get();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/change_picture', compact('lecturer', 'notificationn', 'notification', 'student', 'lecturerss', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


    public function change_password() {

        if (Auth::guard('lecturer')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $lecturers = Auth::guard('lecturer')->user()->department_id;
        $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->get();
        $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
        $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
        $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
        $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
        $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
        // $level500 = User::where('level', '=', 5)->latest()->get();
        // $level600 = User::where('level', '=', 6)->latest()->get();
        // $level700 = User::where('level', '=', 7)->latest()->get();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/change_password', compact('lecturer', 'notificationn', 'notification', 'student', 'lecturerss', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}




public function calender() {

    if (Auth::guard('lecturer')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
    $level100 = User::where('level_id', '=', 1)->where('department_id', '=', $lecturers)->latest()->get();
    $level200 = User::where('level_id', '=', 2)->where('department_id', '=', $lecturers)->latest()->get();
    $level300 = User::where('level_id', '=', 3)->where('department_id', '=', $lecturers)->latest()->get();
    $level400 = User::where('level_id', '=', 4)->where('department_id', '=', $lecturers)->latest()->get();
    // $level500 = User::where('level', '=', 5)->latest()->get();
    // $level600 = User::where('level', '=', 6)->latest()->get();
    // $level700 = User::where('level', '=', 7)->latest()->get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/calender', compact('lecturer', 'notificationn', 'notification', 'student', 'lecturerss', 'studentss', 'level100', 'level200', 'level300', 'level400', 'faculty', 'department', 'section'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}



}
