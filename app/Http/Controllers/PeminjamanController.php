<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $judul = $request->judul;
        $nama = $request->nama;
        $tanggalPinjam = $request->tanggal_pinjam;
        $tanggalKembali = $request->tanggal_kembali;

        $peminjaman = Peminjaman::query();

        if ($status) $peminjaman->where('status', $status);
        if ($judul) $peminjaman->whereHas('buku', function ($query) use ($judul) {
            $query->where('judul', 'like', '%' . $judul . '%');
        });
        if ($nama) $peminjaman->whereHas('anggota', function ($query) use ($peminjaman) {
            $query->where('nama', 'like', '%' . $peminjaman . '%');
        });
        if ($tanggalPinjam) $peminjaman->whereDate('tanggal_pinjam', $tanggalPinjam);
        if ($tanggalKembali) $peminjaman->whereDate('tanggal_kembali', $tanggalKembali);

        // Ambil data peminjaman berdasarkan filter (jika ada)
        $dataPeminjaman = $peminjaman->get();
        return view('peminjaman.index', [
            'peminjaman' => $dataPeminjaman,
            'request' => $request->input(),
        ]);
    }

    public function tambah()
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('peminjaman.tambah', compact('buku', 'anggota'));
    }

    public function store(Request $request)
    {
        $bukuIds = json_decode($request->buku_id);

        if (!is_array($bukuIds)) {
            return redirect()->back()->with('error', 'Format buku_id tidak valid.');
        }

        $anggota_id = Anggota::where('nomor_identitas', $request->nomor_identitas)->first()->id;

        foreach ($bukuIds as $bukuId) {
            if (Peminjaman::where('buku_id', $bukuId)->where('anggota_id', $anggota_id)->exists()) {
                continue;
            }
            $data = new Peminjaman();
            $data->buku_id = $bukuId;
            $data->anggota_id = $anggota_id;
            $data->tanggal_pinjam = $request->tanggal_pinjam;
            $data->tanggal_kembali = $request->tanggal_kembali;
            $data->save();
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

    public function kurang()
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('peminjaman.kurang', compact('buku', 'anggota'));
    }

    public function pull(Request $request)
    {
        if (!$request->buku_id) {
            return redirect()->back()->with('failed', 'Buku tidak ditemukan');
        }
        foreach ($request->buku_id as $v) {
            $data = Peminjaman::where('buku_id', $v)->where('anggota_id', $request->anggota_id)->first();
            if ($data) {
                $data->status = "Di Kembalikan";
                $data->tanggal_terima = date("Y-m-d");
                $data->save();
            }
        }

        return redirect()->route('peminjaman.index')->with('success', 'Berhasil mengembalikan buku');
    }

    public function status(Request $request)
    {
        $data = Peminjaman::find($request->id);
        if ($request->status == "Di Kembalikan") {
            $data->tanggal_terima = date("Y-m-d");
        } else {
            $data->tanggal_terima = null;
        }
        $data->status = $request->status;
        $data->save();

        return redirect()->route('peminjaman.index')->with('success', 'Status berhasil di ubah.');
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

    public function anggotap(Request $request)
    {
        $anggota = Anggota::where('nomor_identitas', $request->nomor_identitas)->first();

        if (!$anggota) {
            return response()->json(['message' => 'Data anggota tidak ditemukan']);
        } else {
            $peminjam = Peminjaman::where('anggota_id', $anggota->id)->where('status', 'Di Pinjam')->with('anggota')->with('buku')->get();
            if (!$peminjam->count()) {
                return response()->json(['message' => 'Data anggota tidak ditemukan']);
            } else {
                return response()->json($peminjam);
            }
        }
    }

    public function buku(Request $request)
    {
        $buku = Buku::where('kode', $request->buku_id)->first();

        return response()->json($buku);
    }
}
