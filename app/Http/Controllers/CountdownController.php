<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Lecturer;
use App\Models\Countdown;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ClearedClearance;
use Illuminate\Support\Facades\Auth;

class CountdownController extends Controller
{
    



    // Countdown Controller

    public function upload_countdown(Admin $admin) {

        if (Auth::guard('admin')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate(10);
        $level = Level::paginate();
        $countdown = Countdown::paginate(10);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

        return view('lecturer/admin/upload_countdown', compact('admin', 'notificationn', 'notification', 'countdown', 'lecturer', 'student', 'faculty', 'department', 'section', 'level'));
    }

}

    public function upload_countdownn(Request $request) {

        if (Auth::guard('admin')->check()) {

        $requests = $request->validate([
            'coursereg_timer' => ['required', 'min:1', Rule::unique('countdowns', 'coursereg_timer')],
        ]);

        $requests['unique_id'] = rand(time(), 1000000);
        $requests['status'] = 'Active';

        Countdown::create($requests);

        return back()->with('success', 'Countdown Successfully Added!');
    }

}





public function edit_countdown(Admin $admin, Countdown $countdown) {

    if (Auth::guard('admin')->check()) {

        $lecturer = Lecturer::paginate();
        $student = User::paginate();
        $faculty = Faculty::paginate();
        $department = Department::paginate();
        $section = Section::paginate(10);
        $level = Level::paginate();
        $countdowns = Countdown::paginate(10);

        $notificationn = ClearedClearance::get();
        $notification = ClearedClearance::latest()->paginate(5);

    return view('lecturer/admin/edit_countdown', compact('admin', 'notificationn', 'notification', 'countdown', 'lecturer', 'student', 'faculty', 'department', 'section', 'countdowns', 'level'));
}

}


public function edit_countdownn(Request $request, Countdown $countdown) {

    if (Auth::guard('admin')->check()) {

    $requests = $request->validate([
        'coursereg_timer' => ['required', 'min:1'],
    ]);

    $requests['coursereg_timer'] = strip_tags($requests['coursereg_timer']);

    $countdown->update($requests);

    return back()->with('success', 'Successfully Updated!');
}

}

    // Countdown Controller End





}
