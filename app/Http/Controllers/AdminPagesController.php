<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Course;
use App\Models\Result;
use App\Models\Faculty;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Lecturer;
use App\Models\Semester;
use App\Models\CourseReg;
use App\Models\Department;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\ClearedClearance;
use App\Models\StudentClearance;
use App\Models\RoleHasPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class AdminPagesController extends Controller
{
    public function admin_login() {
        return view('lecturer/admin/index');
    }

    public function logout() {
        return view('lecturer/admin');
    }

    public function dashboard(Admin $admin) {

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('dashboard')) {

        // $admin = Admin::paginate();
        $lecturer = Lecturer::paginate(10);
        $student = User::paginate(10);
        $faculty = Faculty::paginate(10);
        $department = Department::paginate(10);
        $section = Section::paginate(10);
        $level = Level::paginate(10);
        $course = Course::paginate(10);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        

        return view('lecturer/admin/dashboard', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'course'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}

    public function add_admin(Request $request, Admin $admin) {


        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_admin')) {

        $admins = Admin::paginate(10);
        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        $permissionn = $admin->getPermissionNames();

        

        return view('lecturer/admin/add_admin', compact('admin', 'permissionn', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }


}



public function edit_admin(Admin $admin) {


    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('edit_admin')) {

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::paginate(10);
    $permission = Permission::paginate(10);

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/edit_admin', compact('admin', 'role', 'permission', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}


}









public function add_role(Admin $admin) {

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_role')) {

     $adminss = Admin::get();

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::paginate(10);
    $permission = Permission::paginate(10);

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/add_role', compact('role', 'permission', 'admin', 'adminss', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}



}


public function edit_role(Admin $admin, Request $request, Role $roles, Permission $permissions) {


    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('edit_role')) {

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::paginate(10);
    $permission = Permission::paginate(10);

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);


    return view('lecturer/admin/edit_role', compact('roles', 'role', 'permission', 'permissions', 'admin', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}










public function add_permission(Admin $admin) {

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_permission')) {

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $permission = Permission::paginate(10);
    $role = Role::paginate(10);

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/add_role', compact('permission', 'role', 'admin', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}


}


public function edit_permission(Admin $admin, Request $request, Permission $permissions) {


    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('edit_permission')) {

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $permission = Permission::paginate(10);
    $role = Role::paginate(10);

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/edit_permission', compact('permissions', 'permission', 'role', 'admin', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}




public function admin_role_permission(Admin $admin) {

    // $this->authorize('admin_role_permission');

    if (Auth::guard('admin')->check()) {
    
    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::paginate(10);
    $permission = Permission::paginate(10);
    $arp = RoleHasPermission::paginate(10);

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/admin_role_permission', compact('role', 'permission', 'arp', 'admin', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));


} else {
    return  back()->with('error', 'Unauthorized access!!!');
}

}





public function edit_admin_role_permission(Admin $admin, RoleHasPermission $permissions,$name) {

    // $this->authorize('edit_admin_role_permission');

    if (Auth::guard('admin')->check()) {

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::paginate(10);
    $permission = Permission::paginate(10);
    $arp = RoleHasPermission::paginate(10);

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/edit_admin_role_permission', compact('role', 'permission', 'permissions','name', 'arp', 'admin', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));



} else {
    return  back()->with('error', 'Unauthorized access!!!');
}

}









    public function add_lecturer(Admin $admin) {

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_lecturer')) {

        $lecturer = Lecturer::paginate(10);
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/add_lecturer', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


public function change_lecturer_details(Admin $admin, Lecturer $lecturers) {

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('change_lecturer_details')) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $users = User::get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/change_lecturer_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'lecturers', 'student', 'users', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}






    public function add_student(Admin $admin) {

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_student')) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate(10);
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);


        return view('lecturer/admin/add_student', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


public function change_student_details(Admin $admin, User $user) {

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('change_student_details')) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $users = User::get();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/change_student_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'users', 'user', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}



public function add_course(Admin $admin) {

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_course')) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate(10);
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();
    $course = Course::paginate(10);
    $courses = Course::paginate(10);
    $semester = Semester::paginate(10);

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/add_course', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'courses', 'course', 'semester'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}


public function change_course_details(Admin $admin, Course $coursess) {

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('change_course_details')) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();
    $course = Course::paginate(10);
    $semester = Semester::get();
    
    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/change_course_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'course', 'coursess', 'semester'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}





    public function add_faculty(Admin $admin) {
        
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_faculty')) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate(10);
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        
        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

            return view('lecturer/admin/add_faculty', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
            

    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


public function change_faculty_details(Admin $admin, Faculty $faculties) {
        
    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('change_faculty_details')) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();
    
    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/change_faculty_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'faculties', 'department', 'section', 'level'));
        

} else {
    return back()->with('error', 'Unauthorized access!');
}

}


    public function add_department(Admin $admin) {

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_department')) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate(10);
        $section = Section::paginate();
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/add_department', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


public function change_department_details(Admin $admin, Department $departments) {

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('change_department_details')) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/change_department_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'departments', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}


    public function add_section(Admin $admin) {

        if (Auth::guard('admin')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate(10);
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/add_section', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


public function change_section_details(Admin $admin, Section $sections) {

    if (Auth::guard('admin')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/change_section_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'sections', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}


    public function add_level(Admin $admin) {

        if (Auth::guard('admin')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate(10);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/add_level', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}



public function change_level_details(Admin $admin, Level $levels) {

    if (Auth::guard('admin')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/change_level_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'levels'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}



public function add_semester(Admin $admin) {

    if (Auth::guard('admin')->check()) {

    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate(10);
    $semester = Semester::paginate(10);

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/add_semester', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'semester'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}



public function change_semester_details(Admin $admin, Semester $semesters) {

    if (Auth::guard('admin')->check()) {
    
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();
    $semester = Semester::paginate(10);

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/change_semester_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'semester', 'semesters'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }
    
    }




    public function add_payment(Admin $admin) {

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('add_payment')) {
    
        $lecturer = Lecturer::paginate();
        $student = User::paginate(10);
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $course = Course::paginate(10);
        $courses = Course::paginate(10);
        $semester = Semester::paginate(10);
        $payment = Payment::paginate(10);
    
        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/add_payment', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'courses', 'course', 'semester', 'payment'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }
    
    }



    public function change_payment_details(Admin $admin, Payment $payments) {

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('change_payment_details')) {
    
        $lecturer = Lecturer::paginate();
        $student = User::paginate(10);
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $course = Course::paginate(10);
        $courses = Course::paginate(10);
        $semester = Semester::paginate(10);
        $payment = Payment::paginate(10);
    
        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/change_payment_details', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'courses', 'course', 'semester', 'payment', 'payments'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }
    
    }



    public function clearance_form(Admin $admin, ClearedClearance $students) {

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('clearance_form')) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $studentsss = ClearedClearance::latest()->paginate(50);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/clearance_form', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'studentsss', 'students'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}

    public function clearance(Admin $admin) {

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('clearance')) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
        $studentsss = ClearedClearance::latest()->paginate(50);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/clearance', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level', 'studentsss'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}

    public function settings_a(Admin $admin) {

        if (Auth::guard('admin')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/settings_a', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'seection', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


    public function change_picture(Admin $admin) {

        if (Auth::guard('admin')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/change_picture', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


    public function change_email(Admin $admin) {

        if (Auth::guard('admin')->check()) {
        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/settings_a', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }

}


public function change_password(Admin $admin) {

    if (Auth::guard('admin')->check()) {
        
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/change_password', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}




public function calender(Admin $admin) {

    if (Auth::guard('admin')->check()) {
        
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/calender', compact('admin', 'notificationn', 'notification', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
} else {
    return back()->with('error', 'Unauthorized access!');
}

}




}
