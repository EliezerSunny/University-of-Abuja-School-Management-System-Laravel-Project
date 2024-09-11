<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

	use HasFactory;


    protected $fillable = [
        'unique_id',
        'section',
        'status',
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


    public function result()
    {
        return $this->hasMany(Result::class);
    }


}
