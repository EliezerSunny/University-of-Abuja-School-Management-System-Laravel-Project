<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Database\Eloquent\Model;

class Lecturer extends Authenticatable implements MustVerifyEmail
{
    
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions;

    protected $guard = 'lecturer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'unique_id',
        'name',
        'position',
        'picture',
        'faculty_id',
        'department_id',
        'section_id',
        'password',
        'reset_password_token',
        'school_email',
        'email',
        'phone_no',
        'location',
        'last_activity',
        'status',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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



    public function clearedClearance()
    {
        return $this->hasMany(ClearedClearance::class);
    }


}
