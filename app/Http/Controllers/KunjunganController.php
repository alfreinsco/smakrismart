<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungan = Kunjungan::orderBy('waktu_kunjung', 'DESC')->get();
        return view('kunjungan.index', compact('kunjungan'));
    }

    public function tambah()
    {
        return view('kunjungan.tambah');
    }

    public function store(Request $request, Kunjungan $kunjungan, Anggota $anggota)
    {
        $request->validate([
            'nomor_identitas' => [
                'required',
                Rule::exists('anggota')->where(function ($query) use ($request) {
                    $query->where('nomor_identitas', $request->nomor_identitas);
                }),
            ]
        ], [
            'nomor_identitas.required' => 'Nomor identitas tidak boleh kosong.',
            'nomor_identitas.exists' => 'Nomor identitas tidak terdaftar.',
        ]);

        $waktu_kunjung = date('Y-m-d');

        $anggota = $anggota->where('nomor_identitas', $request->nomor_identitas)->first();

        if ($kunjungan->where('anggota_id', $anggota->id)->where('waktu_kunjung', $waktu_kunjung)->count()) {
            return redirect()->back()->with('success', 'Pengunjung telah terdaftar di hari ini');
        }

        $kunjungan->anggota_id = $anggota->id;
        $kunjungan->waktu_kunjung = $waktu_kunjung;
        $kunjungan->save();

        return redirect()->route('kunjungan.index')
            ->with('success', 'Berhasil menambahkan pengunjung baru.');
    }

    public function show(Kunjungan $kunjungan)
    {
        return view('kunjungan.show', compact('kunjungan'));
    }

    public function ubah(Kunjungan $kunjungan)
    {
        return view('kunjungan.ubah', compact('kunjungan'));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        // Validasi data dari $request

        $kunjungan->update($request->all());

        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan berhasil diperbarui.');
    }

    public function hapus(Kunjungan $kunjungan, $id)
    {
        $kunjungan = $kunjungan->find($id);
        $kunjungan->delete();

        return redirect()->route('kunjungan.index')
            ->with('success', 'Kunjungan berhasil dihapus.');
    }
}
