<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class equipment_category extends Model
{
    protected $table = 'equipment_categories';

    protected $fillable = [
        'name',
        'description',
        'color',
        'is_active',
    ];

    // Relasi ke equipment (One to Many)
    public function equipments()
    {
        return $this->hasMany(equipment::class, 'category_id');
    }
}
