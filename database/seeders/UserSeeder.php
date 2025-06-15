<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat akun Admin
        User::create([
            'name' => 'Admin Suryana',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'), // ganti dengan password aman                     // sesuaikan kolom role di migration
        ]);

    }
}
