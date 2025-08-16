<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class room_category extends Model
{
    protected $table = 'room_categories';

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public function rooms()
    {
        return $this->hasMany(room::class, 'category_id');
    }
}
