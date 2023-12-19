<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalResult extends Model
{
    use HasFactory;


    protected $fillable = [
        'faculty_id',
        'department_id',
        'level_id',
        'session_id',
        'semester_id',
        'result_id',
        'user_id',
        'lecturer_id',
        'unique_id',
        'total_course_unit',
        'total_wgp',
        'gpa',
        'class_grade',
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

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function result()
    {
        return $this->belongsTo(Result::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

}
