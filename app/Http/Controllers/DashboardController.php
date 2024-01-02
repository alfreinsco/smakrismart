<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'buku' => new Buku(),
            'anggota' => new Anggota(),
            'peminjaman' => new Peminjaman(),
        ]);
    }
}
