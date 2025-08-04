<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $table = 'notification';

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'message',
        'is_read',
    ];
}
