<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $guarded = ['id'];

    // Relasi dengan buku
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    // Relasi dengan anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
