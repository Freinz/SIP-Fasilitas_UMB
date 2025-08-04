<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ktm_guarantees extends Model
{
    protected $table = 'ktm_guarantees';

    protected $fillable = [
        'loan_request_id',
        'ktm_number',
        'ktm_holder_name',
        'ktm_image_path',
        'deposited_at',
        'returned_at',
        'deposited_by',
        'returned_by',
        'status',
    ];

    public function loanRequest()
    {
        return $this->belongsTo(loan_request::class, 'loan_request_id');
    }

    public function depositor()
    {
        return $this->belongsTo(User::class, 'deposited_by');
    }

    public function returner()
    {
        return $this->belongsTo(User::class, 'returned_by');
    }
}
