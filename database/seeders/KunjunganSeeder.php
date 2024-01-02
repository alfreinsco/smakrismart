<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Kunjungan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil 20 data anggota secara acak
        $anggotaIDs = Anggota::inRandomOrder()->limit(20)->pluck('id')->toArray();

        // Buat entri kunjungan terkait dengan anggota yang telah dipilih secara acak
        for ($i = 0; $i < 20; $i++) {
            Kunjungan::create([
                'anggota_id' => $anggotaIDs[$i],
                'waktu_kunjung' => now()->subDays(random_int(1, 10)),
                // Sesuaikan kolom lainnya jika perlu
            ]);
        }
    }
}
