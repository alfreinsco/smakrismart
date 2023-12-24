<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = ['id'];

    // Relasi dengan buku
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
