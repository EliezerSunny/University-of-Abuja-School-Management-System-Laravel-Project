<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Course;
use App\Models\Result;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Lecturer;
use App\Models\Semester;
use App\Models\CourseReg;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ClearedClearance;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{

    // search_student_result Controller End
public function search_student_result(Request $request, Admin $admin, User $user)
{
    if (Auth::guard('admin')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $users = User::get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    $query = $request->input('q');
    $results = User::all();

    $results = User::where('name', 'LIKE', '%' . $query . '%')->orWhere('unique_id', 'LIKE', '%' . $query . '%')->paginate(15);
    
    return view('lecturer/admin/search_student_result', compact('results', 'query', 'admin', 'notificationn', 'notification', 'lecturer', 'student', 'users', 'user', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_student_result Controller End



    // search_students_result Controller End
    public function search_students_result(Request $request, Admin $admin, User $user)
    {
        if (Auth::guard('admin')->check()) {
    
        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $users = User::get();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);
    
        $query = $request->input('q');
        $results = User::all();
    
        $results = User::where('name', 'LIKE', '%' . $query . '%')->orWhere('unique_id', 'LIKE', '%' . $query . '%')->paginate(15);
        
        return view('lecturer/admin/search_students_result', compact('results', 'query', 'admin','notificationn', 'notification', 'lecturer', 'student', 'users', 'user', 'faculty', 'department', 'section', 'level'));
    
    }
    
        return back()->with('error', 'Opps, Something went wrong!');
    
    }
    // search_students_result Controller End
    
    



    public function get_students(Request $request, Admin $admin, User $user) 
    {

        if (Auth::guard('admin')->check()) {

            $lecturer = Lecturer::paginate();
            $students = User::paginate(10);
            $faculty = Faculty::paginate();
            $department = Department::paginate();
            $section = Section::paginate();
            $level = Level::paginate();
            $course = Course::paginate(10);
            $courses = Course::paginate(10);
            $course_reg = CourseReg::paginate(10);
            $semester = Semester::paginate(10);
            $result = Result::paginate(10);

            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);


        for ($i=0; $i < 20; $i++) { 
            $tokenss = Str::random(100);
        }

    
        $tokensss = base64_encode($tokenss);



        return view('/lecturer/admin/get_students', compact('admin', 'tokensss', 'notificationn', 'notification', 'lecturer', 'students', 'faculty', 'department', 'section', 'level', 'course', 'courses', 'course_reg', 'semester', 'result'));

    }

}




public function get_students_for_result(Request $request, Admin $admin, User $user) 
    {

        if (Auth::guard('admin')->check()) {

            $lecturer = Lecturer::paginate();
            $students = User::paginate(10);
            $faculty = Faculty::paginate();
            $department = Department::paginate();
            $section = Section::paginate();
            $level = Level::paginate();
            $course = Course::paginate(10);
            $courses = Course::paginate(10);
            $course_reg = CourseReg::paginate(10);
            $semester = Semester::paginate(10);
            $result = Result::paginate(10);

            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);



        $faculty_idd = $request->input('faculty_id');
        $department_idd = $request->input('department_id');
        $section_idd = $request->input('section_id');
        $level_idd = $request->input('level_id');

    if ($faculty_idd == NULL || $department_idd == NULL || $section_idd == NULL || $level_idd == NULL) {
        return back()->with('error', 'Input can\'t be empty');
    }

    $studentss = User::where('faculty_id', '=', $faculty_idd)->where('department_id', '=', $department_idd)->where('section_id', '=', $section_idd)->where('level_id', '=', $level_idd)->get();
    $studentsss = User::where('faculty_id', '=', $faculty_idd)->where('department_id', '=', $department_idd)->where('section_id', '=', $section_idd)->where('level_id', '=', $level_idd)->paginate(20);

    for ($i=0; $i < 20; $i++) { 
        $tokenss = Str::random(100);
    }


    $tokensss = base64_encode($tokenss);

        return view('/lecturer/admin/get_students_for_result', compact('admin', 'tokensss', 'faculty_idd', 'department_idd', 'section_idd', 'level_idd', 'notificationn', 'notification', 'lecturer', 'students', 'studentss', 'studentsss', 'faculty', 'department', 'section', 'level', 'course', 'courses', 'course_reg', 'semester', 'result'));

    }

}




// edit_student_result
public function edit_student_result(Request $request, Admin $admin, User $user) 
    {

        if (Auth::guard('admin')->check()) {

            $lecturer = Lecturer::paginate();
            $students = User::paginate(10);
            $faculty = Faculty::paginate();
            $department = Department::paginate();
            $section = Section::paginate();
            $level = Level::paginate();
            $course = Course::paginate(10);
            $courses = Course::paginate(10);
            $course_reg = CourseReg::paginate(10);
            $semester = Semester::paginate(10);
            $result = Result::paginate(10);

            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);


        for ($i=0; $i < 20; $i++) { 
            $tokenss = Str::random(100);
        }

    
        $tokensss = base64_encode($tokenss);




        return view('/lecturer/admin/edit_student_result', ['admin' => $admin, 'tokensss' => $tokensss, 'notificationn' => $notificationn, 'notification' => $notification, 'lecturer' => $lecturer,'students' => $students,'faculty' => $faculty,'department' => $department,'section' => $section,'level' => $level,'course' => $course,'courses' => $courses,'course_reg' => $course_reg,'semester' => $semester,'result' => $result]);

    }

}







public function edit_student_for_result(Request $request, Admin $admin, User $user) 
    {

        if (Auth::guard('admin')->check()) {

            $lecturer = Lecturer::paginate();
            $students = User::paginate(10);
            $faculty = Faculty::paginate();
            $department = Department::paginate();
            $section = Section::paginate();
            $level = Level::paginate();
            $course = Course::paginate(10);
            $courses = Course::paginate(10);
            $course_reg = CourseReg::paginate(10);
            $semester = Semester::paginate(10);
            $result = Result::paginate(10);

            $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);



        $faculty_idd = $request->input('faculty_id');
        $department_idd = $request->input('department_id');
        $section_idd = $request->input('section_id');
        $level_idd = $request->input('level_id');

    if ($faculty_idd == NULL || $department_idd == NULL || $section_idd == NULL || $level_idd == NULL) {
        return back()->with('error', 'Input can\'t be empty');
    }

    $studentss = User::where('faculty_id', '=', $faculty_idd)->where('department_id', '=', $department_idd)->where('section_id', '=', $section_idd)->where('level_id', '=', $level_idd)->get();
    $studentsss = User::where('faculty_id', '=', $faculty_idd)->where('department_id', '=', $department_idd)->where('section_id', '=', $section_idd)->where('level_id', '=', $level_idd)->paginate(20);

    for ($i=0; $i < 20; $i++) { 
        $tokenss = Str::random(100);
    }


    $tokensss = base64_encode($tokenss);

        return view('/lecturer/admin/edit_student_for_result', compact('admin', 'tokensss', 'faculty_idd', 'department_idd', 'section_idd', 'level_idd', 'notificationn', 'notification', 'lecturer', 'students', 'studentss', 'studentsss', 'faculty', 'department', 'section', 'level', 'course', 'courses', 'course_reg', 'semester', 'result'));

    }

}

// edit_student_result end






public function upload_result(Admin $admin, User $id,$name) {

    if (Auth::guard('admin')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate(10);
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();
    $course = Course::paginate(10);
    $courses = Course::paginate(10);
    $course_reg = CourseReg::paginate(10);
    $semester = Semester::paginate(10);
    $result = Result::paginate(10);

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    $fscourse_reg = CourseReg::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->get();
    $sscourse_reg = CourseReg::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->get();

    return view('lecturer/admin/upload_result', compact('admin', 'notificationn', 'notification', 'id', 'name', 'fscourse_reg', 'sscourse_reg', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'courses', 'course', 'course_reg', 'result', 'semester'));
}

}




public function edit_result(Admin $admin, Result $results,User $id,$name) {

    if (Auth::guard('admin')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate(10);
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $course = Course::paginate(10);
        $courses = Course::paginate(10);
        $course_reg = CourseReg::paginate(10);
        $semester = Semester::paginate(10);
        $result = Result::paginate(10);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);
    
        $fscourse_reg = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->get();
        $sscourse_reg = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->get();
    
        
    $ffscourse_reg = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->sum('weighted_grade_point');
    $ssscourse_reg = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->sum('weighted_grade_point');

    $fcourse_unit = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->with('course_regs', 'courses')->sum('course_unit');
    $scourse_unit = Result::where('user_id', '=', $id->id)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->with(['course_regs', 'courses'])->sum('course_unit');

        return view('lecturer/admin/edit_result', compact('admin', 'notificationn', 'notification', 'fcourse_unit', 'scourse_unit', 'ffscourse_reg', 'ssscourse_reg', 'id', 'name', 'fscourse_reg', 'sscourse_reg', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'courses', 'course', 'course_reg', 'result', 'results', 'semester'));
    }

}




public function edit_results(Admin $admin, Result $results) {

    if (Auth::guard('admin')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate(10);
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $course = Course::paginate(10);
        $courses = Course::paginate(10);
        $course_reg = CourseReg::paginate(10);
        $semester = Semester::paginate(10);
        $result = Result::paginate(10);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);
    
        // $fscourse_reg = Result::where('id', '=', $results)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 1)->get();
        // $sscourse_reg = Result::where('id', '=', $results)->where('level_id', '=', 1)->where('section_id', '=', 1)->where('semester_id', '=', 2)->get();
    
        return view('lecturer/admin/edit_results', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'courses', 'course', 'course_reg', 'result', 'results', 'semester'));
    }

}





}
