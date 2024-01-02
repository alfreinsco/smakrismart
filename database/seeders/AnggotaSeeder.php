<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;
use Faker\Factory as Faker;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            $jenisKelamin = $faker->randomElement(['Laki-laki', 'Perempuan']);
            $status = $faker->randomElement(['Aktif', 'Tidak Aktif']);
            $jabatan = $faker->randomElement(['Guru', 'Siswa']);

            Anggota::create([
                'nama' => $faker->name($jenisKelamin),
                'nomor_identitas' => $faker->unique()->randomNumber(8),
                'nomor_telepon' => $faker->phoneNumber,
                'jabatan' => $jabatan,
                'jenis_kelamin' => $jenisKelamin,
                'status' => $status,
                'alamat' => $faker->address
            ]);
        }
    }
}
