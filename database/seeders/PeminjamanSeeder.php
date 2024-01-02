<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Faker\Factory as Faker;

class PeminjamanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ambil semua ID anggota dari database
        $anggotaIds = Anggota::pluck('id')->toArray();
        $bukuIds = Buku::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            $tanggal_pinjam = $faker->dateTimeBetween('-30 days', 'now');
            $tanggal_kembali = $faker->dateTimeBetween($tanggal_pinjam, '+30 days');
            $anggotaId = $faker->randomElement($anggotaIds);
            $bukuId = $faker->randomElement($bukuIds);

            Peminjaman::create([
                'anggota_id' => $anggotaId,
                'buku_id' => $bukuId,
                'tanggal_pinjam' => $tanggal_pinjam,
                'tanggal_kembali' => $tanggal_kembali,
            ]);
        }
    }
}
