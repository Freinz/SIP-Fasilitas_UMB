<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_request_id',
        'approver_id',
        'approver_role',
        'action',
        'notes',
        'action_at',
    ];

    public function loanRequest()
    {
        return $this->belongsTo(loan_request::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}
