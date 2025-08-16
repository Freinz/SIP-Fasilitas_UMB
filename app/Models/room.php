<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'code',
        'description',
        'capacity',
        'facilities',
        'location',
        'image_path',
        'is_active',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(room_category::class, 'category_id');
    }

    // Relasi ke loan_rooms (One to Many)
    public function loanRooms()
    {
        return $this->hasMany(loan_rooms::class, 'room_id');
    }
}
