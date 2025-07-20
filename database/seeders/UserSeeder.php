<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin awal
        $admin = User::updateOrCreate(
            ['email' => 'admin@ypui.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('superadmin'), // Ganti password sesuai kebutuhan
            ]
        );

        // Assign role super_admin
        if (! $admin->hasRole('super_admin')) {
            $admin->assignRole('super_admin');
        }
    }
}