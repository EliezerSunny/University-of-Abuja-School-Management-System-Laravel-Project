<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'department_id',
        'level_id',
        'section_id',
        'semester_id',
        'unique_id',
        'course_code',
        'course_title',
        'course_unit',
        'course_status',
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

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }


}
