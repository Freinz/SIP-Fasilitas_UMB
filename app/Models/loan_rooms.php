<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loan_rooms extends Model
{
    protected $table = 'loan_rooms';

    protected $fillable = [
        'loan_request_id',
        'room_id',
        'date',
        'start_time',
        'end_time',
    ];

    public function loanRequest()
    {
        return $this->belongsTo(loan_request::class, 'loan_request_id');
    }

    public function room()
    {
        return $this->belongsTo(room::class, 'room_id');
    }
}
