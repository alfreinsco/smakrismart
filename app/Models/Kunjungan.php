<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';
    protected $guarded = ['id'];

    // Relasi dengan anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
