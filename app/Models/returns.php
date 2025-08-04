<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class returns extends Model
{
    protected $table = 'returns';

    protected $fillable = [
        'loan_request_id',
        'returned_by',
        'returned_at',
        'notes',
    ];

    public function loanRequest()
    {
        return $this->belongsTo(loan_request::class, 'loan_request_id');
    }

    public function returner()
    {
        return $this->belongsTo(User::class, 'returned_by');
    }

    // Relasi ke return_items (One to Many)
    public function returnItems()
    {
        return $this->hasMany(return_item::class, 'return_id');
    }
}
