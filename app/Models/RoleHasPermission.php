<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;


    protected $fillable = [
        'permission_id',
        'role_id',
    ];
    
    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
    
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


}
