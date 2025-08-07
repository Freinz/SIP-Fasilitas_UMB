<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Create superadmin role if not exists
        $role = Role::firstOrCreate([
            'name' => 'superadmin',
            'guard_name' => 'web',
        ]);

        // Create superadmin user
        $user = User::firstOrCreate([
            'email' => 'admin@phoenixcoded.com'
        ], [
            'name' => 'Admin',
            'phone' => null,
            'nim_nip' => null,
            'ktm_number' => null,
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'is_active' => true,
            'remember_token' => null,
        ]);

        // Assign role to user
        $user->assignRole($role->name);
    }
}
