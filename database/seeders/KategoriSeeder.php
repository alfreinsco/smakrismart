<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriData = [
            ['nama' => 'Fiksi', 'deskripsi' => 'Buku-buku fiksi'],
            ['nama' => 'Non-Fiksi', 'deskripsi' => 'Buku-buku non-fiksi'],
            ['nama' => 'Sejarah', 'deskripsi' => 'Buku-buku sejarah'],
            ['nama' => 'Teknologi', 'deskripsi' => 'Buku-buku tentang teknologi'],
            ['nama' => 'Kesehatan', 'deskripsi' => 'Buku-buku tentang kesehatan'],
            ['nama' => 'Hobi', 'deskripsi' => 'Buku-buku tentang hobi'],
            ['nama' => 'Pendidikan', 'deskripsi' => 'Buku-buku tentang pendidikan'],
            ['nama' => 'Olahraga', 'deskripsi' => 'Buku-buku tentang olahraga'],
            ['nama' => 'Seni', 'deskripsi' => 'Buku-buku tentang seni'],
            ['nama' => 'Politik', 'deskripsi' => 'Buku-buku tentang politik'],
        ];

        foreach ($kategoriData as $data) {
            Kategori::create($data);
        }
    }
}
