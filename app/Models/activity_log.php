<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class activity_log extends Model
{
    protected $table = 'activity_log';

    protected $fillable = [
        'user_id',
        'action',
        'description',
        'created_at',
    ];
}
