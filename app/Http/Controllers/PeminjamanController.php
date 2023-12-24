<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function tambah()
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('peminjaman.tambah', compact('buku', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id[]' => 'required|exists:buku,id',
            'nomor_identitas' => 'required|exists:anggota,nomor_identitas',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        $anggota_id = Anggota::where('nomor_identitas', $request->nomor_identitas)->first();

        foreach ($request->buku_id as $v) {
            $v = new Peminjaman();
            $v->buku_id = $request->buku_id;
            $v->anggota_id = $request->anggota_id;
            $v->tanggal_pinjam = $request->tanggal_pinjam;
            $v->tanggal_kembali = $request->tanggal_kembali;
            $v->save();
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }


    public function ubah($id)
    {
        $peminjaman = Peminjaman::find($id);
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('peminjaman.ubah', compact('peminjaman', 'buku', 'anggota'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'anggota_id' => 'required|exists:anggota,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        $peminjaman = Peminjaman::find($id);
        $peminjaman->buku_id = $validatedData['buku_id'];
        $peminjaman->anggota_id = $validatedData['anggota_id'];
        $peminjaman->tanggal_pinjam = $validatedData['tanggal_pinjam'];
        $peminjaman->tanggal_kembali = $validatedData['tanggal_kembali'];
        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diubah.');
    }


    public function hapus($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function anggota(Request $request)
    {
        $anggota = Anggota::where('nomor_identitas', $request->nomor_identitas)->first();

        if (!$anggota) {
            return response()->json(['message' => 'Data anggota tidak ditemukan']);
        } else {
            return response()->json($anggota);
        }
    }
}
