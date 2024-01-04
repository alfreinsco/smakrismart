<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function home()
    {
        return view('home', [
            'buku' => new Buku(),
            'anggota' => new Anggota(),
            'peminjaman' => new Peminjaman(),
        ]);
    }

    public function buku(Request $request)
    {
        if ($request->key && $request->value) {
            if ($request->key == 'judul') {
                $request->merge(['judul' => $request->value]);
            } else {
                $request->merge(['kategori' => $request->value]);
            }
        }
        $judul = $request->judul;
        $kategori = $request->kategori;

        $query = Buku::query();

        if ($judul) {
            $query->where('judul', 'LIKE', '%' . $judul . '%');
        }

        if ($kategori) {
            $query->where('kategori_id', $kategori);
        }

        $query->select('buku.*', DB::raw('CASE WHEN p.status = "Di Pinjam" THEN "Di Pinjam" ELSE "Tersedia" END AS status'))
            ->leftJoin(DB::raw('(SELECT buku_id, MAX(status) AS status FROM peminjaman GROUP BY buku_id) as p'), function ($join) {
                $join->on('buku.id', '=', 'p.buku_id');
            })
            ->orderBy('judul', 'ASC')
            ->get();


        $buku = $query->orderBy('judul', 'ASC')->get();
        return view('buku', [
            'buku' => $buku,
            'kategori' => Kategori::get(),
            'request' => $request->input(),
        ]);
    }
}
