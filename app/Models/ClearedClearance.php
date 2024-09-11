<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearedClearance extends Model
{
    use HasFactory;


    protected $fillable = [
        'level_id',
        'faculty_id',
        'department_id',
        'section_id',
        'user_id',
        'lecturer_id',
        'admin_id',
        'student_clearance_id',
        'school_receipt',
        'student_result',
        'proof',
        'status',
    ];



    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function student_clearance()
    {
        return $this->belongsTo(StudentClearance::class);
    }


}
