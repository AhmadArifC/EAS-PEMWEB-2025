<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // jalankan seeder pengguna
        $this->call([
            UserSeeder::class,
            // jika nanti ada seeder lain, tambahkan di sini:
            // ProdukSeeder::class,
            // KategoriSeeder::class,
        ]);
    }
}
