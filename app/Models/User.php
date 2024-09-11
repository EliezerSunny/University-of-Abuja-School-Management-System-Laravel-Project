<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions;

    // protected $guard = 'user';

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
        'level_id',
        'faculty_id',
        'department_id',
        'section_id',
        'password',
        'reset_password_token',
        'school_email',
        'email',
        'phone_no',
        'location',
        'programme',
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



    /**
     * Send a password reset notification to the user.
     *
     * @param string $token
     */
    // public function sendPasswordResetNotification($token): void 
    // {
    //     $url = 'http://127.0.0.1:8000/reset_password?token=' . $token;

    //     $this->notify(new ResetPasswordNotification($url));

    // }


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



    public function studentClearance()
    {
        return $this->hasMany(StudentClearance::class);
    }

    public function courseReg()
    {
        return $this->hasMany(CourseReg::class);
    }


}
 
