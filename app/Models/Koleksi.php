<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    protected $table = 'koleksi';
    protected $guarded = ['id'];

    // Relasi dengan buku
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
