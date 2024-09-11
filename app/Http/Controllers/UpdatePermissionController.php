<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Lecturer;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\ClearedClearance;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class UpdatePermissionController extends Controller
{
    

    public function get_admin_permission(Request $request, Admin $admin) {


        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('get_admin_permission')) {

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

        $role = Role::all();
        $permission = Permission::all();

        

        return view('lecturer/admin/get_admin_permission', compact('admin', 'permissionn', 'role', 'permission', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    } else {
        return back()->with('error', 'Unauthorized access!');
    }


}


    
    public function edit_admin_permission(Admin $admin) {


        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('edit_admin_permission')) {
    
        $admins = Admin::paginate(10);
        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate();
        $level = Level::paginate();
    
        $role = Role::where('guard_name', '=', 'admin')->get();
    $permission = Permission::where('guard_name', '=', 'admin')->get();
    
        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);
    
        return view('lecturer/admin/edit_admin_permission', compact('admin', 'role', 'permission', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    }

}


public function remove_admin_permission(Admin $admin) {


    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('remove_admin_permission')) {

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::where('guard_name', '=', 'admin')->get();
    $permission = Permission::where('guard_name', '=', 'admin')->get();

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/remove_admin_permission', compact('admin', 'role', 'permission', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
}

}



public function update_admin_permission(Request $request, $admin) {

    $admin_id = Admin::find($admin);

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('update_admin_permission')) {

        if (empty($request['name']) || empty($request['role_name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
        'name' => ['required', 'min:1'],
        'role_name' => ['required'],
    ]);


    $admin_id->assignRole($request->input('role_name'));
    $admin_id->givePermissionTo($request->input('name'));

    return back()->with('success', 'Successfully Updated!');
} else {
    return back()->with('error', 'Something went wrong!');
}

}




public function revoke_admin_permission(Request $request, $admin) {

    $admin_id = Admin::find($admin);

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('remove_admin_permission')) {

        if (empty($request['name']) || empty($request['role_name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
        'name' => ['required', 'min:1'],
        'role_name' => ['required', 'min:1'],
    ]);


    $admin_id->removeRole($request->input('role_name'));
    $admin_id->revokePermissionTo($request->input('name'));

    return back()->with('success', 'Successfully Updated!');
} else {
    return back()->with('error', 'Something went wrong!');
}

}



// Lecturer



public function edit_lecturer_permission(Lecturer $lecturer) {


    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('edit_lecturer_permission')) {

    $admins = Admin::paginate(10);
    $lecturerr = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::where('guard_name', '=', 'lecturer')->get();
    $permission = Permission::where('guard_name', '=', 'lecturer')->get();

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/edit_lecturer_permission', compact('lecturerr', 'role', 'permission', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
}

}


public function remove_lecturer_permission(Lecturer $lecturer) {


    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('remove_lecturer_permission')) {

    $admins = Admin::paginate(10);
    $lecturerr = Lecturer::paginate();
    $student = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::where('guard_name', '=', 'lecturer')->get();
    $permission = Permission::where('guard_name', '=', 'lecturer')->get();

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/remove_lecturer_permission', compact('lecturerr', 'role', 'permission', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
}

}


public function update_lecturer_permission(Request $request, $lecturer) {

    $lecturer_id = Lecturer::find($lecturer);

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('update_lecturer_permission')) {

        if (empty($request['name']) || empty($request['role_name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
        'name' => ['required', 'min:1'],
        'role_name' => ['required', 'min:1'],
    ]);


    $lecturer_id->assignRole($request->input('role_name'));
    $lecturer_id->givePermissionTo($request->input('name'));
    

    return back()->with('success', 'Successfully Updated!');
} else {
    return back()->with('error', 'Something went wrong!');
}

}




public function revoke_lecturer_permission(Request $request, $lecturer) {

    $lecturer_id = Lecturer::find($lecturer);

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('remove_lecturer_permission')) {

        if (empty($request['name']) || empty($request['role_name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
        'name' => ['required', 'min:1'],
        'role_name' => ['required', 'min:1'],
    ]);


    $lecturer_id->removeRole($request->input('role_name'));
    $lecturer_id->revokePermissionTo($request->input('name'));
    

    return back()->with('success', 'Successfully Updated!');
} else {
    return back()->with('error', 'Something went wrong!');
}

}


// student

public function edit_student_permission(User $student) {


    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('edit_student_permission')) {

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $studentt = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::where('guard_name', '=', 'web')->get();
    $permission = Permission::where('guard_name', '=', 'web')->get();

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/edit_student_permission', compact('studentt', 'role', 'permission', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
}

}


public function remove_student_permission(User $student) {


    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('remove_student_permission')) {

    $admins = Admin::paginate(10);
    $lecturer = Lecturer::paginate();
    $studentt = User::paginate();
    $faculty = Faculty::paginate();
    $department = Department::paginate();
    $section = Section::paginate();
    $level = Level::paginate();

    $role = Role::where('guard_name', '=', 'web')->get();
    $permission = Permission::where('guard_name', '=', 'web')->get();

    $notificationn = ClearedClearance::get();
    $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/remove_student_permission', compact('studentt', 'role', 'permission', 'notificationn', 'notification', 'admins', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
}

}


public function update_student_permission(Request $request, $user) {

    $user_id = User::find($user);

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('update_student_permission')) {

        if (empty($request['name']) || empty($request['role_name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
        'name' => ['required', 'min:1'],
        'role_name' => ['required', 'min:1'],
    ]);


    $user_id->assignRole($request->input('role_name'));
    $user_id->givePermissionTo($request->input('name'));
    

    return back()->with('success', 'Successfully Updated!');
} else {
    return back()->with('error', 'Something went wrong!');
}

}



public function revoke_student_permission(Request $request, $user) {

    $user_id = User::find($user);

    if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasPermissionTo('remove_student_permission')) {

        if (empty($request['name']) || empty($request['role_name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
        'name' => ['required', 'min:1'],
        'role_name' => ['required', 'min:1'],
    ]);


    $user_id->removeRole($request->input('role_name'));
    $user_id->revokePermissionTo($request->input('name'));
    

    return back()->with('success', 'Successfully Updated!');
} else {
    return back()->with('error', 'Something went wrong!');
}

}



}
