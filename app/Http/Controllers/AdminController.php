<?php

namespace App\Http\Controllers;

// use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Course;
use App\Models\Result;
use App\Models\Faculty;
use App\Models\Payment;
use App\Models\Section;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Semester;
use App\Models\Department;
// use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ClearedClearance;
use App\Models\RoleHasPermission;
use Spatie\Permission\Models\Role;
use App\Models\AdminRolePermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use App\Mail\StudentRegistration;
use App\Mail\LecturerRegistration;
use App\Mail\AdminRegistration;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    // Admin Controller

    public function admin_up(Request $request) {

        if (Auth::guard('admin')->check()) {
            
        $requests = $request->validate([
            'name' => ['required', 'min:5', 'max:200', Rule::unique('admins', 'name')],
            'email' => ['required', 'email', 'min:5', 'max:200', Rule::unique('admins', 'email')],
            'school_email' => ['required', 'email', 'min:5', 'max:200'],
            'position' => ['required', 'min:1', 'max:200'],
            'faculty_id' => ['required', 'min:1', 'max:200'],
            'department_id' => ['required', 'min:1', 'max:200'],
            'phone_no' => ['required', 'min:11', 'max:15'],
            'password' => ['required', 'min:5', 'max:200'],
            'section_id' => ['required', 'max:200'],
            'location' => ['required', 'min:1'],
            // 'picture' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);

        $admin_exist = Admin::where('name', '=', $request['name'])->orwhere('email', '=', $request['email'])->first();

        if ($admin_exist) {
            return back()->with('error', 'Admin already exist!');
        }


        $requests['password'] = bcrypt($requests['password']);
        // $newImageName = time() . '-' . $request->name_a . '.' . $request->picture_a->extension();
        // $request->picture_a->move(public_path('assets/images/admin'), $newImageName);
        $requests['picture'] = 'user.png';
        $requests['unique_id'] = rand(time(), 100000000);
        $requests['status'] = 'Active Now';
        $admin = Admin::create($requests);

        // $role = Role::all();

        $admin->assignRole('admin');

        // $permission = Permission::all();

        $admin->givePermissionTo('dashboard');


        Mail::to($admin['email'])->send(new AdminRegistration($admin));
        
        
        return redirect('/lecturer/admin/add_admin')->with('success', 'Admin Successfully Added!');
    }

}






public function edit_admin(Request $request, Admin $admin) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $incomingFields = $request->validate([
        'name' => ['required', 'min:5', 'max:200'],
            'email' => ['required', 'email', 'min:5', 'max:200'],
            'school_email' => ['required', 'email', 'min:5', 'max:200'],
            'position' => ['required', 'min:1', 'max:200'],
            'faculty_id' => ['required', 'min:1', 'max:200'],
            'department_id' => ['required', 'min:1', 'max:200'],
            'phone_no' => ['required', 'min:11', 'max:15'],
            'section_id' => ['required', 'max:200'],
            'location' => ['required', 'min:1'],
    ]);

    // $url = explode(" ", $incomingFields['name']);
    //     $roleurl = implode("-", $url);
    //     $roleurll = strtolower($roleurl);
    //     $incomingFields['slug'] = $roleurll;


    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['email'] = strip_tags($incomingFields['email']);
    $incomingFields['school_email'] = strip_tags($incomingFields['school_email']);
    $incomingFields['position'] = strip_tags($incomingFields['position']);
    $incomingFields['faculty_id'] = strip_tags($incomingFields['faculty_id']);
    $incomingFields['department_id'] = strip_tags($incomingFields['department_id']);
    $incomingFields['phone_no'] = strip_tags($incomingFields['phone_no']);
    $incomingFields['section_id'] = strip_tags($incomingFields['section_id']);
    $incomingFields['location'] = strip_tags($incomingFields['location']);

    $admin->update($incomingFields);


    return back()->with('success', 'Successfully Updated!');
}

}



public function delete_admin(Admin $admin) {

    if (Auth::guard('admin')->check()) {
            
            $admin->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}





    public function admin_login(Request $request) {

        if (empty($request['email']) || empty($request['password'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            
                return redirect('/lecturer/admin/dashboard')->with('success', 'Successfully logged in!');
            
        }else{

        return redirect('/lecturer/admin')->with('error', 'Incorrect credentials!');
        }

    }

    public function logout(Request $request): RedirectResponse
    {
        if (Auth::guard('admin')->check()) {
            
        Auth::guard('admin')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

        return redirect('/lecturer/admin')->with('success', 'Successfully logged out!!!');

        }

    }
    // Admin Controller End










    // Role Controller
    public function add_role(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['name']) || empty($request['guard_name'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
            // 'team_id' => ['required'],
            'name' => ['required', 'min:1'],
            'guard_name' => ['required', 'min:1'],
            // 'permission_id' => ['required', 'min:1'],
        ]);


        // $url = explode(" ", $requests['name']);
        // $roleurl = implode("_", $url);
        // $roleurll = strtolower($roleurl);
        // $requests['guard_name'] = $roleurll;

        $role_exist = Role::where('name', '=', $request['name'])->orwhere('guard_name', '=', $request['guard_name'])->first();

        if ($role_exist) {
            return back()->with('error', 'Role already exist!');
        }


        $role = Role::create($requests);

        return back()->with('success', 'Role Successfully Added!');
    }

}




public function edit_role(Request $request, Role $roles) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['name']) || empty($request['guard_name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $incomingFields = $request->validate([
        // 'team_id' => ['required'],
        'name' => ['required', 'min:1'],
        'guard_name' => ['required', 'min:1'],
    ]);

    // $url = explode(" ", $incomingFields['name']);
    //     $roleurl = implode("_", $url);
    //     $roleurll = strtolower($roleurl);
    //     $incomingFields['guard_name'] = $roleurll;


        // $incomingFields['team_id'] = strip_tags($incomingFields['team_id']);
    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['guard_name'] = strip_tags($incomingFields['guard_name']);

    $roles->update($incomingFields);

    return back()->with('success', 'Successfully Updated!');
}

}



public function delete_role(Role $roles) {

    if (Auth::guard('admin')->check()) {
            
            $roles->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}

    // Role Controller End





    // Permission Controller
    public function add_permission(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['name']) || empty($request['guard_name'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
            'name' => ['required', 'min:1'],
            'guard_name' => ['required', 'min:1'],
        ]);

        // $url = explode(" ", $requests['name']);
        // $permissionurl = implode("-", $url);
        // $permissionurll = strtolower($permissionurl);
        // $requests['guard_name'] = $permissionurll;

        $permission_exist = Permission::where('name', '=', $request['name'])->where('guard_name', '=', $request['guard_name'])->first();

        if ($permission_exist) {
            return back()->with('error', 'Permission already exist!');
        }


        $permission = Permission::create($requests);


        return back()->with('success', 'Permission Successfully Added!');
    }

}




public function edit_permission(Request $request, Permission $permissions) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['name']) || empty($request['guard_name'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $incomingFields = $request->validate([
        'name' => ['required', 'min:1'],
        'guard_name' => ['required', 'min:1'],
    ]);

    // $url = explode(" ", $incomingFields['name']);
    //     $permissionurl = implode("-", $url);
    //     $permissionurll = strtolower($permissionurl);
    //     $incomingFields['guard_name'] = $permissionurll;


    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['guard_name'] = strip_tags($incomingFields['guard_name']);

    $permissions->update($incomingFields);

    return back()->with('success', 'Successfully Updated!');
}

}



public function delete_permission(Role $permissions) {

    if (Auth::guard('admin')->check()) {
            
            $permissions->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}

    // Permission Controller End








    // Admin Role and Permission Controller
    public function admin_role_permission(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['permission_id']) || empty($request['role_id'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
        'permission_id' => ['required', 'min:1'],
        'role_id' => ['required', 'min:1'],
        ]);



        RoleHasPermission::create($requests);

        return back()->with('success', 'Admin Role & Permission Successfully Added!');
    }

}




public function edit_admin_role_permission(Request $request, RoleHasPermission $permissions) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['permission_id']) || empty($request['role_id'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
        'permission_id' => ['required', 'min:1'],
        'role_id' => ['required', 'min:1'],
        ]);



    $incomingFields['permission_id'] = strip_tags($incomingFields['permission_id']);
    $incomingFields['role_id'] = strip_tags($incomingFields['role_id']);

    $permissions->update($incomingFields);

    return back()->with('success', 'Successfully Updated!');
}

}



public function delete_admin_role_permission(RoleHasPermission $permissions) {

    if (Auth::guard('admin')->check()) {
            
            $permissions->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}

    // Admin Role and Permission Controller End






    // Lecturer Controller

    public function lecturer_up(Request $request) {

        if (Auth::guard('admin')->check()) {

        $requests = $request->validate([
            'name' => ['required', 'min:5', 'max:200', Rule::unique('lecturers', 'name')],
            'email' => ['required', 'min:5', 'max:200', Rule::unique('lecturers', 'email')],
            'school_email' => ['required', 'min:5', 'max:200'],
            'position' => ['required', 'min:1', 'max:200'],
            'faculty_id' => ['required', 'min:1', 'max:200'],
            'department_id' => ['required', 'min:1', 'max:200'],
            'phone_no' => ['required', 'min:10', 'max:15'],
            'password' => ['required', 'min:5', 'max:200'],
            'section_id' => ['required', 'max:200'],
            'location' => ['required', 'min:5'],
            // 'picture' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);

        $requests['password'] = bcrypt($requests['password']);
        $requests['picture'] = 'user.png';
        $requests['unique_id'] = rand(time(), 100000000);
        $requests['status'] = 'Active';
        $lecturer = Lecturer::create($requests);

        // $role = Role::all();

        $lecturer->assignRole('lecturer');

        // $permission = Permission::all();

        $lecturer->givePermissionTo('dashboard_l');



        Mail::to($lecturer['email'])->send(new LecturerRegistration($lecturer));
        
        
        return redirect('/lecturer/admin/add_lecturer')->with('success', 'Lecturer Successfully Added!');
    }

}



public function change_lecturer_details(Request $request, Lecturer $lecturers) {

    if (Auth::guard('admin')->check()) {

    $incomingFields = $request->validate([
        'name' => ['required', 'min:2', 'max:200'],
        'email' => ['required', 'min:5', 'max:200'],
        'school_email' => ['required', 'min:5', 'max:200'],
        'faculty_id' => ['required', 'min:1', 'max:200'],
        'department_id' => ['required', 'min:1', 'max:200'],
        'section_id' => ['required', 'max:1', 'max:200'],
    ]);

    
    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['email'] = strip_tags($incomingFields['email']);
    $incomingFields['school_email'] = strip_tags($incomingFields['school_email']);
    $incomingFields['faculty_id'] = strip_tags($incomingFields['faculty_id']);
    $incomingFields['department_id'] = strip_tags($incomingFields['department_id']);
    $incomingFields['section_id'] = strip_tags($incomingFields['section_id']);
    
    $lecturers->update($incomingFields);
    

    return back()->with('success', 'Successfully Updated!');
}

}


public function delete_lecturer(Lecturer $lecturers) {

    if (Auth::guard('admin')->check()) {
            
            $lecturers->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}

    // Lecturer Controller End





    // Student Controller

    public function add_student(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['name']) || empty($request['email']) || empty($request['school_email']) || empty($request['faculty_id']) || empty($request['department_id']) || empty($request['department_abbreviation']) || empty($request['password']) || empty($request['level_id']) || empty($request['section_id'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
            'name' => ['required', 'min:5', 'max:200', Rule::unique('users', 'name')],
            'email' => ['required', 'min:5', 'max:200', Rule::unique('users', 'email')],
            'school_email' => ['required', 'min:5', 'max:200', Rule::unique('users', 'school_email')],
            
            'faculty_id' => ['required', 'min:1', 'max:200'],
            'department_id' => ['required', 'min:1', 'max:200'],
            'department_abbreviation' => ['required', 'min:1', 'max:200'],
            'phone_no' => ['required', 'min:10', 'max:15'],
            'password' => ['required', 'min:5', 'max:200'],
            'level_id' => ['required', 'min:1', 'max:200'],
            'section_id' => ['required', 'max:1', 'max:200'],
            'location' => ['required', 'min:1'],
        ]);

        $requests['password'] = bcrypt($requests['password']);
        $requests['picture'] = 'user.png';
        
        if ($requests['department_id'] == 1) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        } elseif ($requests['department_id'] == 2) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        } elseif ($requests['department_id'] == 3) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        } elseif ($requests['department_id'] == 4) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        } elseif ($requests['department_id'] == 5) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        } elseif ($requests['department_id'] == 6) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        } elseif ($requests['department_id'] == 7) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        } elseif ($requests['department_id'] == 8) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        } elseif ($requests['department_id'] == 9) {
            $code = $requests['department_abbreviation'];
            $regno = str_pad(User::where('department_id', $requests['department_id'])->where('section_id', $requests['section_id'])->count() + 1, 3, '0', STR_PAD_LEFT);
        }

        

        // $id = str_pad(User::count() + 1, 3, '0', STR_PAD_LEFT);
        $year = date('y');
        $facty_code = $requests['faculty_id'];
        $dept_code = $requests['department_id'];
        $requests['unique_id'] = $code . '/' . $year . $facty_code . $dept_code . '/' . $regno;

        $token = base64_encode($requests['name']) . base64_encode($requests['unique_id']) . base64_encode($requests['section_id']) . base64_encode($requests['faculty_id'])  . base64_encode($requests['department_id']);
        
        $requests['programme'] = $token;

        $requests['status'] = 'Active';
        $user = User::create($requests);

        // $role = Role::all();

        $user->assignRole('student');

        // $permission = Permission::all();

        $user->givePermissionTo(['dashboard_s']);
        
        
        Mail::to($user['email'])->send(new StudentRegistration($user));


        return redirect('/lecturer/admin/add_student')->with('success', 'Student Successfully Added!');
    }

}






public function change_student_details(Request $request, User $user) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['name']) || empty($request['email']) || empty($request['school_email']) || empty($request['faculty_id']) || empty($request['department_id']) || empty($request['level_id']) || empty($request['section_id'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $incomingFields = $request->validate([
        'unique_id' => ['required'],
        'name' => ['required', 'min:1', 'max:200'],
        'email' => ['required', 'min:1', 'max:200'],
        'school_email' => ['required', 'min:1', 'max:200'],
        'faculty_id' => ['required', 'min:1', 'max:200'],
        'department_id' => ['required', 'min:1', 'max:200'],
        'level_id' => ['required', 'min:1', 'max:200'],
        'section_id' => ['required', 'max:1', 'max:200'],
    ]);

    $token = base64_encode($incomingFields['name']) . base64_encode($incomingFields['unique_id']) . base64_encode($incomingFields['section_id']) . base64_encode($incomingFields['faculty_id'])  . base64_encode($incomingFields['department_id']);
        
    $incomingFields['programme'] = $token;

    
    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['email'] = strip_tags($incomingFields['email']);
    $incomingFields['school_email'] = strip_tags($incomingFields['school_email']);
    $incomingFields['faculty_id'] = strip_tags($incomingFields['faculty_id']);
    $incomingFields['department_id'] = strip_tags($incomingFields['department_id']);
    $incomingFields['level_id'] = strip_tags($incomingFields['level_id']);
    $incomingFields['section_id'] = strip_tags($incomingFields['section_id']);
    $incomingFields['programme'] = strip_tags($incomingFields['programme']);
    
    $user->update($incomingFields);
    
    return back()->with('success', 'Successfully Updated!');
}

}





public function delete_student(User $students) {

    if (Auth::guard('admin')->check()) {
            
            $students->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}




    // Student Controller End


    // Clearance

    public function change_clearance_status(Request $request, ClearedClearance $students) {

        if (Auth::guard('admin')->check()) {
    
        $requests = $request->validate([
            'faculty_id' => ['required'],
            'department_id' => ['required'],
            'lecturer_id' => ['required'],
            'admin_id' => ['required'],
            'section_id' => ['required'],
            'user_id' => ['required'],
            'student_clearance_id' => ['required'],
            'status' => ['required'],

            'student_name' => ['required'],
            'reg_no' => ['required'],
        ]);


        $token = base64_encode($requests['student_name']) . base64_encode($requests['reg_no']) . base64_encode($requests['section_id']) . base64_encode($requests['faculty_id'])  . base64_encode($requests['department_id']);


        $requests['proof'] = $token;

        $requests['status'] = strip_tags($requests['status']);
        $requests['proof'] = strip_tags($requests['proof']);
    
        
        $students->update($requests);
    
        return back()->with('success', 'Student Successfully Cleared!!!');

        }

    
    
    }








    public function delete_clearance_form(ClearedClearance $students) {

        if (Auth::guard('admin')->check()) {
                
                $students->delete();
                return back()->with('success', 'Successfully Deleted!');
    
    }
    
    return back()->with('error', 'Something went wrong. Try again!');
    
    }
    // Clearance End



    // Faculty Controller
    public function add_faculty(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['faculty_name']) || empty($request['faculty_award'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
            'faculty_name' => ['required', 'min:1', Rule::unique('faculties', 'faculty_name')],
            'faculty_award' => ['required', 'min:1'],
            'faculty_dean_name' => ['required', 'min:1'],
            // 'faculty_logo' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);


        // $newImageName = time() . '-' . $request->faculty_name . '.' . $request->faculty_logo->extension();
        // $request->faculty_logo->move(public_path('assets/images/faculties'), $newImageName);
        $requests['faculty_logo'] = 'faculty.png';
        $faculty = Faculty::create($requests);

        return redirect('/lecturer/admin/add_faculty')->with('success', 'Faculty Successfully Added!');
    }

}



public function change_faculty_details(Request $request, Faculty $faculties) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['faculty_name']) || empty($request['faculty_award'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $incomingFields = $request->validate([
        'faculty_name' => ['required', 'min:1'],
        'faculty_award' => ['required', 'min:1'],
        'faculty_dean_name' => ['required', 'min:1'],
    ]);


    $incomingFields['faculty_name'] = strip_tags($incomingFields['faculty_name']);
    $incomingFields['faculty_award'] = strip_tags($incomingFields['faculty_award']);
    $incomingFields['faculty_dean_name'] = strip_tags($incomingFields['faculty_dean_name']);

    $faculties->update($incomingFields);

    return back()->with('success', 'Successfully Updated!');
}

}



public function delete_faculty(Faculty $faculties) {

    if (Auth::guard('admin')->check()) {
            
            $faculties->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}

    // Faculty Controller End



    // Department Controller
    public function add_department(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['faculty_id']) || empty($request['department_name']) || empty($request['department_abbreviation'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
            'faculty_id' => ['required'],
            'department_name' => ['required', 'min:1', Rule::unique('departments', 'department_name')],
            'department_abbreviation' => ['required', 'min:1'],
            'department_hod_name' => ['required', 'min:1'],
            // 'department_logo' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);


        // $newImageName = time() . '-' . $request->department_name . '.' . $request->department_logo->extension();
        // $request->department_logo->move(public_path('assets/images/departments'), $newImageName);
        $requests['department_logo'] = 'department.png';
        $department = Department::create($requests);

        return redirect('/lecturer/admin/add_department')->with('success', 'Department Successfully Added!');
    }

}




public function change_department_details(Request $request, Department $departments) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['faculty_id']) || empty($request['department_name']) || empty($request['department_abbreviation'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $incomingFields = $request->validate([
        'faculty_id' => ['required', 'min:1'],
        'department_name' => ['required', 'min:1'],
        'department_abbreviation' => ['required', 'min:1'],
        'department_hod_name' => ['required', 'min:1'],
    ]);


    $incomingFields['faculty_id'] = strip_tags($incomingFields['faculty_id']);
    $incomingFields['department_name'] = strip_tags($incomingFields['department_name']);
    $incomingFields['department_abbreviation'] = strip_tags($incomingFields['department_abbreviation']);
    $incomingFields['department_hod_name'] = strip_tags($incomingFields['department_hod_name']);

    $departments->update($incomingFields);

    return back()->with('success', 'Successfully Updated!');
}

}



public function delete_department(Department $departments) {

    if (Auth::guard('admin')->check()) {
            
            $departments->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}

    // Department Controller End




    // Section Controller
    public function add_section(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['section'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
            'section' => ['required', 'min:8', 'max:9', Rule::unique('sections', 'section')],
        ]);

        $requests['unique_id'] = rand(time(), 1000000);
        $requests['status'] = 'Active';

        $section = Section::create($requests);

        return redirect('/lecturer/admin/add_section')->with('success', 'Section Successfully Added!');
    }

}




public function change_section_details(Request $request, Section $sections) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['section'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $requests = $request->validate([
        'section' => ['required', 'min:8', 'max:9'],
    ]);

    $requests['section'] = strip_tags($requests['section']);

    $sections->update($requests);

    return back()->with('success', 'Successfully Updated!');
}

}

    // Section Controller End



    // Level Controller
    public function add_level(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['level'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
            'level' => ['required', 'min:3', 'max:3', Rule::unique('levels', 'level')],
        ]);

        $requests['unique_id'] = rand(time(), 1000000);
        $requests['status'] = 'Active';

        $level = Level::create($requests);

        return redirect('/lecturer/admin/add_level')->with('success', 'Level Successfully Added!');
    }

}



public function change_level_details(Request $request, Level $levels) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['level'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $requests = $request->validate([
        'level' => ['required', 'min:3', 'max:3'],
    ]);

    $requests['level'] = strip_tags($requests['level']);

    $levels->update($requests);

    return back()->with('success', 'Successfully Updated!');
}

}

    // Level Controller End





    // Semester Controller
    public function add_semester(Request $request) {

        if (Auth::guard('admin')->check()) {

            if (empty($request['semester'])) {
                return back()->with('error', 'Input can\'t be empty!');
            }

        $requests = $request->validate([
            'section_id' => ['required', 'min:1'],
            'semester' => ['required', 'min:1'],
        ]);

        $requests['unique_id'] = rand(time(), 1000000);
        $requests['status'] = 'Active';

        $semester = Semester::create($requests);

        return redirect('/lecturer/admin/add_semester')->with('success', 'Semester Successfully Added!');
    }

}



public function change_semester_details(Request $request, Semester $semesters) {

    if (Auth::guard('admin')->check()) {

        if (empty($request['semester'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

    $requests = $request->validate([
        'section_id' => ['required', 'min:1'],
        'semester' => ['required', 'min:1'],
    ]);

    $requests['section_id'] = strip_tags($requests['section_id']);
    $requests['semester'] = strip_tags($requests['semester']);

    $semesters->update($requests);

    return back()->with('success', 'Successfully Updated!');
}

}

    // Semester Controller End




    // Course Controller
    public function add_course(Request $request) {

        if (Auth::guard('admin')->check()) {

        $requests = $request->validate([
            'faculty_id' => ['required', 'min:1'],
            'department_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'section_id' => ['required', 'min:1'],
            'semester_id' => ['required', 'min:1'],
            'course_code' => ['required', 'min:1', 'max:8'],
            'course_title' => ['required', 'min:1', 'max:250'],
            'course_unit' => ['required', 'min:1', 'max:1'],
            'course_status' => ['required', 'min:1', 'max:1'],
        ]);

        $dcourse = Course::where('department_id', '=', $requests['department_id'])->where('course_code', $requests['course_code'])->first();

        // if ($requests->fails()) {
        //     return back()->with('error', 'Carefully check your inputs and try again.');
        // }

        if ($dcourse) {
            return back()->with('error', 'Course already registered for the department.');
        }

        

        $requests['unique_id'] = rand(time(), 1000000);
        $requests['status'] = 'Active';

        $course = Course::create($requests);

        return redirect('/lecturer/admin/add_course')->with('success', 'Course Successfully Added!');
    }

}



public function change_course_details(Request $request, Course $coursess) {

    if (Auth::guard('admin')->check()) {

    $requests = $request->validate([
        'faculty_id' => ['required', 'min:1'],
        'department_id' => ['required', 'min:1'],
        'level_id' => ['required', 'min:1'],
        'semester_id' => ['required', 'min:1'],
        'course_code' => ['required', 'min:1', 'max:8'],
        'course_title' => ['required', 'min:1', 'max:250'],
        'course_unit' => ['required', 'min:1', 'max:1'],
        'course_status' => ['required', 'min:1', 'max:1'],
    ]);

    $requests['faculty_id'] = strip_tags($requests['faculty_id']);
    $requests['department_id'] = strip_tags($requests['department_id']);
    $requests['level_id'] = strip_tags($requests['level_id']);
    $requests['semester_id'] = strip_tags($requests['semester_id']);
    $requests['course_code'] = strip_tags($requests['course_code']);
    $requests['course_title'] = strip_tags($requests['course_title']);
    $requests['course_unit'] = strip_tags($requests['course_unit']);
    $requests['course_status'] = strip_tags($requests['course_status']);

    $coursess->update($requests);

    return back()->with('success', 'Successfully Updated!');
}

}





public function delete_course(Course $courses) {

    if (Auth::guard('admin')->check()) {
            
            $courses->delete();
            return back()->with('success', 'Successfully Deleted!');

}

return back()->with('error', 'Something went wrong. Try again!');

}

    // Course Controller End



/*

// Results multiple data at once 


    // Result Controller
public function upload_result(Request $request) {

    if (Auth::guard('admin')->check()) {
    
       // dd($request->all());

        $request->validate([
            'faculty_id' => ['required', 'array'],
            'department_id' => ['required', 'array'],
            'level_id' => ['required', 'array'],
            'section_id' => ['required', 'array'],
            'semester_id' => ['required', 'array'],
            'course_reg_id' => ['required', 'array'],
            'user_id' => ['required', 'array'],
            'course_unit' => ['required', 'array'],
            'final_score' => ['required', 'array', 'numeric', 'between:0,100'],
        ]);
        
        $resultsToInsert = [];
        $selectedCourseRegIds = $request->course_reg_id;
      //  $selectedCourseUnits = $request->course_unit;
        $selectedFinalScore = $request->final_score;
        
        foreach ($selectedCourseRegIds as $index => $courseRegId) {
            $facultyId = $request->faculty_id[$courseRegId];
            $departmentId = $request->department_id[$courseRegId];
            $levelId = $request->level_id[$courseRegId];
            $sectionId = $request->section_id[$courseRegId];
            $semesterId = $request->semester_id[$courseRegId];
            $userId = $request->user_id[$courseRegId];
            $finalScore = $selectedFinalScore[$courseRegId];
            $courseUnit = $request->course_unit[$courseRegId];

            // Check if result already exists
            $rcourse = Result::where('user_id', $userId)
                             ->where('course_reg_id', $courseRegId)
                             ->exists();

            if ($rcourse) {
                return back()->with('error', 'Result for course {$courseRegId} already uploaded for student {$userId}.');
            }

            // Grade calculation
            if ($finalScore >= 70) {
                $grade = 'A';
                $grade_point = 5;
            } elseif ($finalScore >= 60) {
                $grade = 'B';
                $grade_point = 4;
            } elseif ($finalScore >= 50) {
                $grade = 'C';
                $grade_point = 3;
            } elseif ($finalScore >= 45) {
                $grade = 'D';
                $grade_point = 2;
            } elseif ($finalScore >= 40) {
                $grade = 'E';
                $grade_point = 1;
            } else {
                $grade = 'F';
                $grade_point = 0;
            }

            $weighted_grade_point = $courseUnit * $grade_point;

            // Prepare data for batch insert
            $resultsToInsert[] = [
                'user_id' => $userId,
                'faculty_id' => $facultyId,
                'department_id' => $departmentId,
                'level_id' => $levelId,
                'section_id' => $sectionId,
                'semester_id' => $semesterId,
                'course_reg_id' => $courseRegId,
                'course_unit' => $courseUnit,
                'final_score' => $finalScore,
                'grade' => $grade,
                'grade_point' => $grade_point,
                'weighted_grade_point' => $weighted_grade_point,
                'lecturer_id' => 1,
                'unique_id' => rand(time(), 1000000),
                'status' => 'Active',
            ];
        }
        

        // Batch insert results
        Result::create($resultsToInsert);

        return back()->with('success', 'Results Successfully uploaded!');
    }

}



// Results multiple data at once end

*/





    // Result Controller
    public function upload_result(Request $request) {

        if (Auth::guard('admin')->check()) {


        $requests = $request->validate([
            'faculty_id' => ['required', 'min:1'],
            'department_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'section_id' => ['required', 'min:1'],
            'semester_id' => ['required', 'min:1'],
            'course_reg_id' => ['required', 'min:1'],
            'user_id' => ['required', 'min:1'],
            'course_unit' => ['required', 'min:1'],
            'final_score' => ['max:3'],
        ]);
        
       //  foreach ($requests as $key => $requestt) {

        $rcourse = Result::where('user_id', '=', $requests['user_id'])->where('course_reg_id', '=', $requests['course_reg_id'])->exists();


        if ($rcourse) {
            return back()->with('error', 'Student result already uploaded.');
        }

        if ($requests['final_score'] >= 70) {
            $requests['grade'] = 'A';
            $requests['grade_point'] = 5;
        } elseif ($requests['final_score'] >= 60) {
            $requests['grade'] = 'B';
            $requests['grade_point'] = 4;
        } elseif ($requests['final_score'] >= 50) {
            $requests['grade'] = 'C';
            $requests['grade_point'] = 3;
        } elseif ($requests['final_score'] >= 45) {
            $requests['grade'] = 'D';
            $requests['grade_point'] = 2;
        } elseif ($requests['final_score'] >= 40) {
            $requests['grade'] = 'E';
            $requests['grade_point'] = 1;
        } else {
            $requests['grade'] = 'F';
            $requests['grade_point'] = 0;
        }

        $requests['grade'] = $requests['grade'];
        $requests['grade_point'] = $requests['grade_point'];

        $requests['weighted_grade_point'] = $requests['course_unit'] * $requests['grade_point'];

        $requests['weighted_grade_point'] = $requests['weighted_grade_point'];


        // if ($requests->fails()) {
        //     return back()->with('error', 'Carefully check your inputs and try again.');
        // }


        $requests['lecturer_id'] = 1;
        $requests['unique_id'] = rand(time(), 1000000);
        $requests['status'] = 'Active';

        

            Result::create($requests);
        // }

        return back()->with('success', 'Result Successfully uploaded!');
    }

}


// Result End






// Edit Controller
public function edit_results(Request $request, Result $results) {

    if (Auth::guard('admin')->check()) {


    $requests = $request->validate([
        // 'faculty_id' => ['required', 'min:1'],
        // 'department_id' => ['required', 'min:1'],
        // 'level_id' => ['required', 'min:1'],
        // 'section_id' => ['required', 'min:1'],
        // 'semester_id' => ['required', 'min:1'],
        // 'course_reg_id' => ['required', 'min:1'],
        // 'user_id' => ['required', 'min:1'],
        'course_unit' => ['required', 'min:1'],
        'final_score' => ['max:3'],
    ]);


    if ($requests['final_score'] >= 70) {
        $requests['grade'] = 'A';
        $requests['grade_point'] = 5;
    } elseif ($requests['final_score'] >= 60) {
        $requests['grade'] = 'B';
        $requests['grade_point'] = 4;
    } elseif ($requests['final_score'] >= 50) {
        $requests['grade'] = 'C';
        $requests['grade_point'] = 3;
    } elseif ($requests['final_score'] >= 45) {
        $requests['grade'] = 'D';
        $requests['grade_point'] = 2;
    } elseif ($requests['final_score'] >= 40) {
        $requests['grade'] = 'E';
        $requests['grade_point'] = 1;
    } else {
        $requests['grade'] = 'F';
        $requests['grade_point'] = 0;
    }

    $requests['grade'] = $requests['grade'];
    $requests['grade_point'] = $requests['grade_point'];

    $requests['weighted_grade_point'] = $requests['course_unit'] * $requests['grade_point'];

    $requests['weighted_grade_point'] = $requests['weighted_grade_point'];


    // if ($requests->fails()) {
    //     return back()->with('error', 'Carefully check your inputs and try again.');
    // }


    $requests['lecturer_id'] = 1;
    $requests['unique_id'] = rand(time(), 1000000);
    $requests['status'] = 'Active';

    // foreach ($requests as $requestt) {
        // $requests['faculty_id'] = strip_tags($requests['faculty_id']);
        // $requests['department_id'] = strip_tags($requests['department_id']);
        // $requests['level_id'] = strip_tags($requests['level_id']);
        // $requests['section_id'] = strip_tags($requests['section_id']);
        // $requests['semester_id'] = strip_tags($requests['semester_id']);
        // $requests['course_reg_id'] = strip_tags($requests['course_reg_id']);
        // $requests['user_id'] = strip_tags($requests['user_id']);
        $requests['course_unit'] = strip_tags($requests['course_unit']);
        $requests['final_score'] = strip_tags($requests['final_score']);
        $requests['grade'] = strip_tags($requests['grade']);
        $requests['grade_point'] = strip_tags($requests['grade_point']);
        $requests['weighted_grade_point'] = strip_tags($requests['weighted_grade_point']);
    
        $results->update($requests);
    // }

    return back()->with('success', 'Result Successfully uploaded!');
}

}

// Edit Result End





    // Payment Controller
    public function add_payment(Request $request) {

        if (Auth::guard('admin')->check()) {


        $requests = $request->validate([
            'faculty_id' => ['required', 'min:1'],
            'department_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'section_id' => ['required', 'min:1'],
            // 'semester_id' => ['required', 'min:1'],
            'currency' => ['required', 'min:1', 'max:5'],
            'amount' => ['required', 'min:1', 'max:250'],
            'payment_name' => ['required', 'min:1', 'max:250'],
        ]);

        $requests['unique_id'] = rand(time(), 1000000);
        // $requests['user_id'] = Auth::guard('admin')->user()->id;
        // $requests['course_id'] = Auth::guard('admin')->user()->id;

        $arr = explode(" ", $requests['payment_name']);
        $paymenturlname = implode("_", $arr);
        $paymenturlnamec = strtolower($paymenturlname);
        $requests['payment_url'] = $paymenturlnamec;
        $requests['status'] = 'Active';

        $payment = Payment::create($requests);

        return redirect('/lecturer/admin/add_payment')->with('success', 'Payment Successfully Added!');
    }

}



public function change_payment_details(Request $request, Payment $payments) {

    if (Auth::guard('admin')->check()) {


    $requests = $request->validate([
        'faculty_id' => ['required', 'min:1'],
            'department_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'section_id' => ['required', 'min:1'],
            // 'semester_id' => ['required', 'min:1'],
            'currency' => ['required', 'min:1', 'max:5'],
            'amount' => ['required', 'min:1', 'max:250'],
            'payment_name' => ['required', 'min:1', 'max:250'],
    ]);

        $arr = explode(" ", $requests['payment_name']);
        $paymenturlname = implode("_", $arr);
        $paymenturlnamec = strtolower($paymenturlname);
        $requests['payment_url'] = $paymenturlnamec;
        


    $requests['faculty_id'] = strip_tags($requests['faculty_id']);
    $requests['department_id'] = strip_tags($requests['department_id']);
    $requests['level_id'] = strip_tags($requests['level_id']);
    $requests['section_id'] = strip_tags($requests['section_id']);
    // $requests['semester_id'] = strip_tags($requests['semester_id']);
    $requests['currency'] = strip_tags($requests['currency']);
    $requests['amount'] = strip_tags($requests['amount']);
    $requests['payment_name'] = strip_tags($requests['payment_name']);
    $requests['payment_url'] = strip_tags($requests['payment_url']);


    
    $payments->update($requests);

    return back()->with('success', 'Successfully Updated!');
}

}

    // Payment Controller End




    // change_picture Controller
    public function change_picture(Request $request) {

        if (Auth::guard('admin')->check()) {

        $admin = Auth::guard('admin')->user();

        if (empty($request['name']) || empty($request['picture'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $requests = $request->validate([
            'name' => ['required', 'min:1'],
            'picture' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->picture->extension();
        $request->picture->move(public_path('assets/images/admin'), $newImageName);
        $requests['picture'] = $newImageName;

        $admin->update($requests);

        return redirect('/lecturer/admin/change_picture')->with('success', 'Picture Successfully Changed!');
    }

}
    // change_picture Controller End


    // change_email Controller End
    public function change_email(Request $request): RedirectResponse 
    {
        if (Auth::guard('admin')->check()) {

        $admin = Auth::guard('admin')->user();

        if (empty($request['email']) || empty($request['school_email'])) {
            return back()->with('error', 'Input can\'t be empty!');
        }

        $incomingFields = $request->validate([
            'email' => ['required', 'email'],
            'school_email' => ['required', 'email'],
        ]);

        $incomingFields['email'] = strip_tags($incomingFields['email']);
        $incomingFields['school_email'] = strip_tags($incomingFields['school_email']);
        $admin->update($incomingFields);

        return back()->with('success', 'Email successfully updated!');
    }

}
    // change_email Controller End


    // change_password Controller End
    public function change_password(Request $request): RedirectResponse 
    {
        if (Auth::guard('admin')->check()) {

        $admin = Auth::guard('admin')->user();

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



        if (Hash::check($incomingFields['current_password'], $admin->password)) {


            $incomingFields['password'] = bcrypt($incomingFields['password']);
            $admin->update($incomingFields);

        return back()->with('success', 'Password successfully Changed!');
            

        }else{

        return back()->with('error', 'Current password incorrect!');
        }

    }

}
    // change_password Controller End





    


}
