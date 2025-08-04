<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'code',
        'description',
        'category_id',
        'quantity_total',
        'quantity_available',
        'condition',
        'purchase_price',
        'purchase_date',
        'image_path',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(equipment_category::class, 'category_id');
    }

    // Relasi ke loan_equipment (One to Many)
    public function loanEquipments()
    {
        return $this->hasMany(loan_equipment::class, 'equipment_id');
    }
}
