<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;


    protected $fillable = [
        'section_id',
        'unique_id',
        'semester',
        'status',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
    
    public function lecturer()
    {
        return $this->hasMany(Lecturer::class);
    }

    public function student()
    {
        return $this->hasMany(User::class);
    }

    public function course_reg()
    {
        return $this->hasMany(CourseReg::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }


}
