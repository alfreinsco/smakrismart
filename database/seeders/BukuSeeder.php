<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Kategori;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua ID kategori yang ada di database
        $kategoriIds = Kategori::pluck('id')->toArray();

        // Generate kode unik

        for ($i = 0; $i < 20; $i++) {
            $kode = uniqid() . uniqid(); // Ganti format kode
            Buku::create([
                'kode' => $kode,
                'judul' => $faker->sentence(3),
                'pengarang' => $faker->name,
                'kategori_id' => $faker->randomElement($kategoriIds),
            ]);
        }
    }
}
