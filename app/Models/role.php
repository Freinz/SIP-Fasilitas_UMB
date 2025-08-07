<?php

namespace App\Models;
use App\Models\permission;
use App\Models\User;

use Spatie\Permission\Models\Role as SpatieRole;

class role extends SpatieRole
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'guard_name',
    ];

    // ...existing code...
}
