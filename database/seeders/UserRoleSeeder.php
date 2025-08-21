<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'peminjam',
            'admin rumah tangga',
            'admin bagian umum',
            'pimpinan',
            'superadmin',
        ];
        foreach ($roles as $role) {
            $email = str_replace(' ', '', $role) . '@gmail.com';
            $user = User::firstOrCreate([
                'email' => $email,
            ], [
                'name' => ucfirst($role),
                'password' => Hash::make('12345678'),
            ]);
            $user->assignRole($role);
        }
    }
}
