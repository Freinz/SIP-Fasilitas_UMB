<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'nim_nip',
        'user_type',
        'ktm_number',
        'password',
        'is_active',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the user's type (role).
     */
    public function getUserTypeLabelAttribute()
    {
        $types = [
            'mahasiswa' => 'Mahasiswa',
            'admin_rt' => 'Admin RT',
            'admin_umum' => 'Admin Umum',
            'pimpinan' => 'Pimpinan',
            'superadmin' => 'Superadmin',
        ];
        return $types[$this->user_type] ?? $this->user_type;
    }

    /**
     * Get the user's active status as label.
     */
    public function getIsActiveLabelAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke loan_requests (One to Many)
    public function loanRequests()
    {
        return $this->hasMany(loan_request::class, 'user_id');
    }

    // Relasi ke notifications (One to Many)
    public function notifications()
    {
        return $this->hasMany(notification::class, 'user_id');
    }

    // Relasi ke roles (Many to Many)
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    }

    // Relasi ke permissions (Many to Many)
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'model_has_permissions', 'model_id', 'permission_id');
    }
}
