<?php

namespace App\Models;
use App\Models\permission;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'guard_name',
    ];

    // Relasi ke permissions (Many to Many)
    public function permissions()
    {
        return $this->belongsToMany(permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }

    // Relasi ke users (Many to Many)
    public function users()
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    }
}
