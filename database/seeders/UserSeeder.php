<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $user = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'), // ganti dengan password yang aman
            'role'     => 'admin',
            'status'   => 'aktif', 
        ]);
        $user->assignRole('admin');

        // Staff
        $user = User::create([
            'name'     => 'Staff',
            'email'    => 'staff@example.com',
            'password' => Hash::make('password'), // ganti dengan password yang aman
            'role'     => 'staff',
            'status'   => 'aktif',
        ]);
        $user->assignRole('staff');
    }
}
