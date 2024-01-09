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
        $faker = Faker::create('id_ID');

        // Ambil semua ID kategori yang ada di database
        $kategoriIds = Kategori::pluck('id')->toArray();

        // Generate kode unik
        for ($i = 1; $i <= 003; $i++) {
            $nomorRak = str_pad($i, 3, '0', STR_PAD_LEFT); // Format nomor rak
            for ($j = 1; $j <= 0020; $j++) {
                $nomorBuku = str_pad($j, 4, '0', STR_PAD_LEFT); // Format nomor buku
                $kode = $nomorRak . '-' . $nomorBuku; // Gabungkan nomor rak dan nomor buku
                Buku::create([
                    'kode' => $kode,
                    'judul' => $faker->sentence(3),
                    'penerbit' => $faker->company,
                    'kota' => $faker->city,
                    'tahun' => $faker->year,
                    'status' => $faker->randomElement(['Dibeli', 'Diberikan', 'Lainya']),
                    'pengarang' => $faker->name,
                    'kategori_id' => $faker->randomElement($kategoriIds),
                ]);
            }
        }
    }
}
