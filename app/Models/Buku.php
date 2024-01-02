<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Buku extends Model
{
    protected $table = 'buku';
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        // Event saat buku sedang disimpan
        static::creating(function ($buku) {
            $faker = Faker::create();
            if (empty($buku->kode)) {
                // Buat kode unik jika kolom 'kode' kosong
                $buku->kode = uniqid() . uniqid();
            }
        });
    }

    // Relasi dengan kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi dengan peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    // Relasi dengan koleksi
    public function koleksi()
    {
        return $this->hasMany(Koleksi::class);
    }
}
