<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loan_equipment extends Model
{
    protected $table = 'loan_equipments';

    protected $fillable = [
        'loan_request_id',
        'equipment_id',
        'quantity_requested',
        'quantity_approved',
        'notes',
    ];

    public function loanRequest()
    {
        return $this->belongsTo(loan_request::class, 'loan_request_id');
    }

    public function equipment()
    {
        return $this->belongsTo(equipment::class, 'equipment_id');
    }

    // Relasi ke return_items (One to Many)
    public function returnItems()
    {
        return $this->hasMany(return_item::class, 'loan_equipment_id');
    }
}
