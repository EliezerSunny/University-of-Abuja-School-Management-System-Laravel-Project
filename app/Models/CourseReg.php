<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReg extends Model
{
    use HasFactory;


    protected $fillable = [
        'faculty_id',
        'department_id',
        'level_id',
        'section_id',
        'semester_id',
        'course_id',
        'user_id',
        'unique_id',
        'course_unit',
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

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }

}
