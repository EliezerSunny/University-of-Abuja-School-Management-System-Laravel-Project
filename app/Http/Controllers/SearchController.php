<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Lecturer;
use App\Models\Semester;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\ClearedClearance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class SearchController extends Controller
{
    

    // search_lecturer Controller End
public function search_lecturer(Request $request, Admin $admin, Lecturer $lecturers)
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
    $results = Lecturer::all();

    $results = Lecturer::where('name', 'LIKE', '%' . $query . '%')->orWhere('position', 'LIKE', '%' . $query . '%')->paginate(15);

    return view('lecturer/admin/search_lecturer', compact('results', 'query', 'admin', 'notificationn', 'notification', 'lecturer', 'lecturers', 'student', 'users', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_lecturer Controller End




// search_student Controller End
public function search_student(Request $request, Admin $admin, User $user)
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

    return view('lecturer/admin/search_student', compact('results', 'query', 'admin', 'notificationn', 'notification', 'lecturer', 'student', 'users', 'user', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_student Controller End



// search_course Controller End
public function search_course(Request $request, Admin $admin, Course $course)
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
    $results = Course::all();

    $results = Course::where('course_code', 'LIKE', '%' . $query . '%')->orWhere('course_title', 'LIKE', '%' . $query . '%')->paginate(15);

    return view('lecturer/admin/search_course', compact('results', 'query', 'admin', 'notificationn', 'notification', 'lecturer', 'student', 'users', 'course', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_course Controller End







// search_lecturer_l Controller End
public function search_lecturer_l(Request $request)
{
    if (Auth::guard('lecturer')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $users = User::get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->get();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    $query = $request->input('q');
    $results = Lecturer::all();

    $results = Lecturer::where('name', 'LIKE', '%' . $query . '%')->orWhere('position', 'LIKE', '%' . $query . '%')->paginate(15);

    return view('lecturer/search_lecturer', compact('results', 'notificationn', 'notification', 'query', 'lecturer', 'lecturerss', 'departmentf', 'studentss', 'student', 'users', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_lecturer_l Controller End




// search_student_l Controller End
public function search_student_l(Request $request, User $user)
{
    if (Auth::guard('lecturer')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $users = User::get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->get();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    $query = $request->input('q');
    $results = User::all();

    $results = User::where('name', 'LIKE', '%' . $query . '%')->orWhere('unique_id', 'LIKE', '%' . $query . '%')->paginate(15);

    return view('lecturer/search_student', compact('results', 'notificationn', 'notification', 'query', 'lecturerss', 'departmentf', 'studentss', 'lecturer', 'student', 'users', 'user', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_student_l Controller End



// search_course_l Controller End
public function search_course_l(Request $request, Lecturer $lecturers, Course $course)
{
    if (Auth::guard('lecturer')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $users = User::get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $lecturers = Auth::guard('lecturer')->user()->department_id;
    $lecturersf = Auth::guard('lecturer')->user()->faculty_id;
    $lecturerss = Lecturer::where('department_id', '=', $lecturers)->latest()->paginate(10);
    $departmentf = Department::where('faculty_id', '=', $lecturersf)->latest()->get();
    $studentss = User::where('department_id', '=', $lecturers)->latest()->get();
    $courses = Course::where('department_id', '=', $lecturers)->latest()->get();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    $query = $request->input('q');
    $results = Course::all();

    $results = Course::where('course_code', 'LIKE', '%' . $query . '%')->orWhere('course_title', 'LIKE', '%' . $query . '%')->orwhere('department_id', '=', $lecturers)->paginate(15);

    return view('lecturer/search_course', compact('results', 'notificationn', 'notification', 'query', 'lecturerss', 'departmentf', 'studentss', 'lecturer', 'student', 'users', 'course', 'courses', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_course_l Controller End











// search_lecturer_p Controller End
public function search_lecturer_p(Request $request)
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
    $results = Lecturer::all();

    $results = Lecturer::where('name', 'LIKE', '%' . $query . '%')->orWhere('position', 'LIKE', '%' . $query . '%')->paginate(15);

    return view('lecturer/admin/search_lecturer_p', compact('results', 'notificationn', 'notification', 'query', 'lecturer', 'student', 'users', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_lecturer_p Controller End




// search_student_p Controller End
public function search_student_p(Request $request, User $user)
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

    return view('lecturer/admin/search_student_p', compact('results', 'notificationn', 'notification', 'query', 'lecturer', 'student', 'users', 'user', 'faculty', 'department', 'section', 'level'));

}

    return back()->with('error', 'Opps, Something went wrong!');

}
// search_student_p Controller End




}
