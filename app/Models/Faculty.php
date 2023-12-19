<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_name',
        'faculty_award',
        'faculty_dean_name',
        'faculty_logo',
        'unit',
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

    public function department()
    {
        return $this->hasMany(Department::class);
    }

}
