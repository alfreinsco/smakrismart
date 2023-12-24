<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;


class AnggotaController extends Controller
{
    public function index()
    {
        return view('anggota.index', [
            'anggota' => Anggota::get()
        ]);
    }

    public function tambah()
    {
        return view('anggota.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_identitas' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'jabatan' => 'required|in:Siswa,Guru',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'alamat' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->storeAs('orang', $request->file('foto')->hashName(), 'public');
        } else {
            $fotoPath = null;
        }

        // Simpan data ke dalam database
        $anggota = new Anggota();
        $anggota->nama = $request->nama;
        $anggota->nomor_identitas = $request->nomor_identitas;
        $anggota->nomor_telepon = $request->nomor_telepon;
        $anggota->jabatan = $request->jabatan;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->status = $request->status;
        $anggota->alamat = $request->alamat;
        $anggota->foto = $fotoPath;
        $anggota->save();

        return redirect()->route('anggota.index')->with('success', 'Berhasil menambahkan anggota baru.');
    }
    public function ubah($id)
    {
        $data = Anggota::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('anggota.ubah', [
            'anggota' => $data
        ]);
    }

    public function update(Request $request, $id = null)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_identitas' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'jabatan' => 'required|in:Siswa,Guru',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Simpan data ke dalam database
        $anggota = Anggota::find($id);
        if (!$anggota) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Proses upload foto
        if ($request->hasFile('foto')) {
            // Menghapus foto jika sudah ada sebelumnya
            if ($anggota->foto) {
                // Hapus foto dari penyimpanan (storage) di sini
                Storage::disk('public')->delete($anggota->foto);
            }
            $fotoPath = $request->file('foto')->storeAs('orang', $request->file('foto')->hashName(), 'public');
            $anggota->foto = $fotoPath;
        }

        $anggota->nama = $request->nama;
        $anggota->nomor_identitas = $request->nomor_identitas;
        $anggota->nomor_telepon = $request->nomor_telepon;
        $anggota->jabatan = $request->jabatan;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->status = $request->status;
        $anggota->alamat = $request->alamat;
        $anggota->save();

        return redirect()->back()->with('success', 'Berhasil menyimpan data anggota.');
    }


    public function hapus($id)
    {
        $data = Anggota::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $data->delete();

        return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus.');
    }

    public function buatKodeBatang(Request $request)
    {
        return DNS1D::getBarcodeHTML($request->isi, 'C39', 1, 28);
    }
}
