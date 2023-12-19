<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    protected $fillable = [
        'faculty_id',
        'department_name',
        'department_abbreviation',
        'department_hod_name',
        'department_logo',
    ];

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

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

}
