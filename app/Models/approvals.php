<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class approvals extends Model
{
    protected $table = 'approvals';

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
        return $this->belongsTo(loan_request::class, 'loan_request_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}
