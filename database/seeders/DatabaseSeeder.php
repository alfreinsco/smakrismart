<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(BukuSeeder::class);
        $this->call(AnggotaSeeder::class);
        $this->call(PeminjamanSeeder::class);
        $this->call(KunjunganSeeder::class);
    }
}
