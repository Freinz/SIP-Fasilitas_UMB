<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class return_item extends Model
{
    //
    protected $table = 'return_items';

    protected $fillable = [
        'return_id',
        'loan_equipment_id',
        'quantity_returned',
        'condition_returned',
        'notes',
    ];

    /**
     * Relasi ke model Return
     */
    public function return(): BelongsTo
    {
        return $this->belongsTo(returns::class, 'return_id');
    }

    /**
     * Relasi ke model LoanEquipment
     */
    public function loanEquipment(): BelongsTo
    {
        return $this->belongsTo(loan_equipment::class, 'loan_equipment_id');
    }
}
