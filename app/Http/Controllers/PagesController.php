<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Course;
use App\Models\Result;
use App\Models\Faculty;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Countdown;
use App\Models\CourseReg;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ClearedClearance;
use App\Models\StudentClearance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function logout() {
        return view('index');
    }

    public function getCurrentSession() {
        $currentYear = date('Y');
        $nextYear = $currentYear +1;

        return $currentYear . '/' . $nextYear;
    }
    

    public function dashboard(Request $request) {

        if (Auth::guard('web')->check() && Auth::guard('web')->user()->hasPermissionTo('dashboard_s')) {

        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $currentSession = $this->getCurrentSession();

        $studentLevel = User::where('id', Auth::guard('web')->user()->id)->get();

        $result = Result::get();
        $semester = Semester::get();
        $countDownTime = Countdown::where('id', '=', 1)->first();

        
        for ($i=0; $i < 20; $i++) { 
            $tokenss = Str::random(100);
        }

    
        $tokensss = base64_encode($tokenss);

        $amountt = Payment::where('faculty_id', Auth::guard('web')->user()->faculty_id)->where('payment_name', 'School Charges')->first();


        return view('dashboard', compact('amountt', 'currentSession', 'tokensss', 'faculty', 'semester', 'countDownTime', 'department', 'section', 'level', 'studentLevel', 'result'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }


}



    public function add_course_reg() {

        if (Auth::guard('web')->check()) {

        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $course = Course::paginate();
        $dcourse = Auth::guard('web')->user()->department_id;
        $studentId = Auth::guard('web')->user()->id;
        $studentLevel = Auth::guard('web')->user()->level_id;
        $fscourse = Course::where('semester_id', '=', 1)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
        $sscourse = Course::where('semester_id', '=', 2)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
        $coursereg = CourseReg::where('user_id', auth()->user('web')->id)->paginate();
        $fregcourse = CourseReg::where('user_id', '=', $studentId)->where('semester_id', '=', 1)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
        $sregcourse = CourseReg::where('user_id', '=', $studentId)->where('semester_id', '=', 2)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
        
        $semester = Semester::paginate();
        $clearance = StudentClearance::where('user_id', auth()->user('web')->id)->get();

        $countDownTime = Countdown::where('id', '=', 1)->first();
        $currentDate = now();



        $fcourse_unit = CourseReg::where('user_id', '=', $studentId)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->sum('course_unit');
        $scourse_unit = CourseReg::where('user_id', '=', $studentId)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->sum('course_unit');


        return view('add_course_reg', compact('clearance', 'fcourse_unit', 'scourse_unit', 'countDownTime', 'currentDate', 'faculty', 'department', 'section', 'level', 'semester', 'course', 'fscourse', 'sscourse', 'coursereg', 'fregcourse', 'sregcourse'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }


}





public function check_course_reg(Request $request) {

    if (Auth::guard('web')->check()) {

    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();
    $course = Course::paginate();
    $dcourse = Auth::guard('web')->user()->department_id;
    $studentId = Auth::guard('web')->user()->id;
    $studentLevel = Auth::guard('web')->user()->level_id;
    $fscourse = Course::where('semester_id', '=', 1)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
    $sscourse = Course::where('semester_id', '=', 2)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
    $coursereg = CourseReg::where('user_id', auth()->user('web')->id)->paginate();
    
    $levell = $request->input('level');
    $semesterr = $request->input('semester');

    if ($levell == NULL) {
        return back()->with('error', 'Input can\'t be empty');
    }

    $fregcourse = CourseReg::where('user_id', '=', $studentId)->where('semester_id', '=', 1)->where('department_id', '=', $dcourse)->where('level_id', '=', $levell)->get();
    $sregcourse = CourseReg::where('user_id', '=', $studentId)->where('semester_id', '=', 2)->where('department_id', '=', $dcourse)->where('level_id', '=', $levell)->get();
    
    $semester = Semester::paginate();
    $clearance = StudentClearance::where('user_id', auth()->user('web')->id)->get();

    $countDownTime = Countdown::where('id', '=', 1)->first();
    $currentDate = now();



    $fcourse_unit = CourseReg::where('user_id', '=', $studentId)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->sum('course_unit');
    $scourse_unit = CourseReg::where('user_id', '=', $studentId)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->sum('course_unit');

    return view('check_course_reg', compact('levell', 'semesterr', 'clearance', 'fcourse_unit', 'scourse_unit', 'countDownTime', 'currentDate', 'faculty', 'department', 'section', 'level', 'semester', 'course', 'fscourse', 'sscourse', 'coursereg', 'fregcourse', 'sregcourse'));
} else {
    return back()->with('error', 'Unauthorized access!');
}


}




public function check_result(Request $request, Result $results, Level $levels) {

    if (Auth::guard('web')->check()) {



    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();
    $course = Course::paginate();
    $dcourse = Auth::guard('web')->user()->department_id;
    $studentId = Auth::guard('web')->user()->id;
    $studentLevel = Auth::guard('web')->user()->level_id;
    $fscourse = Course::where('semester_id', '=', 1)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
    $sscourse = Course::where('semester_id', '=', 2)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
    $coursereg = CourseReg::where('user_id', auth()->user('web')->id)->paginate();
    $fregcourse = CourseReg::where('user_id', '=', $studentId)->where('semester_id', '=', 1)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
    $sregcourse = CourseReg::where('user_id', '=', $studentId)->where('semester_id', '=', 2)->where('department_id', '=', $dcourse)->where('level_id', '=', $studentLevel)->get();
    
    $levell = $request->input('level');
    $semesterr = $request->input('semester');

    if ($levell == NULL) {
        return back()->with('error', 'Input can\'t be empty');
    }

    $fscourse_reg = Result::where('user_id', '=', Auth::guard('web')->user()->id)->where('level_id', '=', $levell)->where('section_id', '=', 1)->where('semester_id', '=', $semesterr)->get();
    $sscourse_reg = Result::where('user_id', '=', Auth::guard('web')->user()->id)->where('level_id', '=', $levell)->where('section_id', '=', 1)->where('semester_id', '=', $semesterr)->get();

    $bscourse_reg = Result::where('user_id', '=', Auth::guard('web')->user()->id)->where('level_id', '=', $levell)->where('section_id', '=', 1)->get();

    $ffscourse_reg = Result::where('user_id', '=', Auth::guard('web')->user()->id)->where('level_id', '=', $levell)->where('section_id', '=', 1)->where('semester_id', '=', $semesterr)->sum('weighted_grade_point');
    $ssscourse_reg = Result::where('user_id', '=', Auth::guard('web')->user()->id)->where('level_id', '=', $levell)->where('section_id', '=', 1)->where('semester_id', '=', $semesterr)->sum('weighted_grade_point');


    $fcourse_unit = Result::where('user_id', '=', Auth::guard('web')->user()->id)->where('level_id', '=', $levell)->where('section_id', '=', 1)->where('semester_id', '=', $semesterr)->sum('course_unit');
    $scourse_unit = Result::where('user_id', '=', Auth::guard('web')->user()->id)->where('level_id', '=', $levell)->where('section_id', '=', 1)->where('semester_id', '=', $semesterr)->sum('course_unit');

    $semester = Semester::paginate();
    $clearance = StudentClearance::where('user_id', auth()->user('web')->id)->get();


    $countDownTime = Countdown::where('id', '=', 1)->first();

    return view('check_result', compact('levell', 'semesterr', 'fscourse_reg', 'countDownTime', 'ffscourse_reg', 'bscourse_reg', 'fcourse_unit', 'scourse_unit', 'sscourse_reg', 'ssscourse_reg', 'clearance', 'faculty', 'department', 'section', 'level', 'levels', 'semester', 'course', 'fscourse', 'sscourse', 'coursereg', 'fregcourse', 'sregcourse'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

// }

}



    public function clearance_form(Request $request) {

        if (Auth::guard('web')->check() /*&& Auth::guard('web')->user()->hasPermissionTo('final_year')*/) {

        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $clearance = StudentClearance::where('user_id', auth()->user('web')->id)->get();
        $clearedclearance = ClearedClearance::where('user_id', auth()->user('web')->id)->where('status', '=', 'Approved')->get();

        $countDownTime = Countdown::where('id', '=', 1)->first();

        $token = ClearedClearance::where('user_id', auth()->user('web')->id)->first();


        $name = auth()->user('web')->name;
        $time = rand(time(), 1000000000000);

        $str = Str::random(100);


        $tokens = base64_encode(auth()->user('web')->id) . $time . $str;

           

        return view('clearance_form', compact('clearance', 'countDownTime', 'clearedclearance', 'name', 'tokens', 'token', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }


}




    public function edit_clearance_form(StudentClearance $edit) {

        if (Auth::guard('web')->check() /*&& Auth::guard('web')->user()->hasPermissionTo('final_year')*/) {

        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $clearance = StudentClearance::where('user_id', auth()->user('web')->id)->get();
        $clearedclearance = ClearedClearance::where('user_id', auth()->user('web')->id)->where('status', '=', 'Approved')->get();

        $countDownTime = Countdown::where('id', '=', 1)->first();

        return view('edit_clearance_form', compact('edit', 'countDownTime', 'clearance', 'clearedclearance', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}



public function print_clearance_letter(Request $request, StudentClearance $edit, $token, $name) {

    if (Auth::guard('web')->check() /*&& Auth::guard('web')->user()->hasPermissionTo('final_year')*/) {

    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();
    $clearance = StudentClearance::where('user_id', auth()->user('web')->id)->get();
    $clearedclearance = ClearedClearance::where('user_id', auth()->user('web')->id)->where('status', '=', 'Approved')->get();

    // $tokens = ClearedClearance::where('user_id', auth()->user('web')->id)->where('proof', '=', auth()->user('web')->programme)->get();

    $countDownTime = Countdown::where('id', '=', 1)->first();

    $names = Auth::guard('web')->user()->name;
    $tokens = Auth::guard('web')->user()->programme;

        if ($token != $tokens) {
            
            return  back()->with('error', 'Unauthorized access!!!');
        
        }

return view('print_clearance_letter', compact('edit', 'countDownTime', 'clearance', 'name', 'token', 'clearedclearance', 'faculty', 'department', 'section', 'level'));



} else {
    return back()->with('error', 'Unauthorized access!');
}


}




    public function change_email() {

        if (Auth::guard('web')->check()) {

        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $countDownTime = Countdown::where('id', '=', 1)->first();

        return view('settings', compact('faculty', 'countDownTime', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


    public function change_picture() {

        if (Auth::guard('web')->check()) {

        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $countDownTime = Countdown::where('id', '=', 1)->first();

        return view('change_picture', compact('faculty', 'countDownTime', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}

public function change_password() {

    if (Auth::guard('web')->check()) {

    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $countDownTime = Countdown::where('id', '=', 1)->first();

    return view('change_password', compact('faculty', 'countDownTime', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}



public function calender() {

    if (Auth::guard('web')->check()) {

    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $countDownTime = Countdown::where('id', '=', 1)->first();

    return view('calender', compact('faculty', 'countDownTime', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}


    
}
