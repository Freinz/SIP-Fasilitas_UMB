<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loan_request extends Model
{
    protected $table = 'loan_requests';

    protected $fillable = [
        'request_number',
        'user_id',
        'loan_type',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'purpose',
        'notes',
        'status',
        'rejection_reason',
        'approved_by',
        'approved_at',
        'recommendation_letter_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Relasi ke loan_rooms (One to Many)
    public function loanRooms()
    {
        return $this->hasMany(loan_rooms::class, 'loan_request_id');
    }

    // Relasi ke loan_equipment (One to Many)
    public function loanEquipments()
    {
        return $this->hasMany(loan_equipment::class, 'loan_request_id');
    }

    // Relasi ke ktm_guarantees (One to One)
    public function ktmGuarantee()
    {
        return $this->hasOne(ktm_guarantees::class, 'loan_request_id');
    }

    // Relasi ke approvals (One to Many)
    public function approvals()
    {
        return $this->hasMany(approvals::class, 'loan_request_id');
    }

    // Relasi ke returns (One to Many)
    public function returns()
    {
        return $this->hasMany(returns::class, 'loan_request_id');
    }

    // Relasi ke documents (One to Many)
    public function documents()
    {
        return $this->hasMany(document::class, 'loan_request_id');
    }
}
