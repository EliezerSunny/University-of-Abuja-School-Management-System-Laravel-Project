<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'level',
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

    public function user()
    {
        return $this->hasMany(User::class);
    }
    

}
