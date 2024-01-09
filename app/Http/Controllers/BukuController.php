<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('kode', 'ASC')->get();
        return view('buku.index', [
            'buku' => $buku
        ]);
    }

    public function tambah()
    {
        $kategori = Kategori::all();
        return view('buku.tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:255|unique:buku,kode',
            'judul' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'kota' => 'required|max:255',
            'tahun' => 'required|max:255',
            'status' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'kategori_id' => 'required|exists:kategori,id',
        ], [
            'kode.unique' => 'Kode sudah digunakan, silahkan gunakan kode lain.'
        ]);

        $buku = new Buku();
        $buku->kode = $validatedData['kode'];
        $buku->judul = $validatedData['judul'];
        $buku->penerbit = $validatedData['penerbit'];
        $buku->kota = $validatedData['kota'];
        $buku->tahun = $validatedData['tahun'];
        $buku->status = $validatedData['status'];
        $buku->pengarang = $validatedData['pengarang'];
        $buku->kategori_id = $validatedData['kategori_id'];
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function ubah($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        return view('buku.ubah', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required|max:255|unique:buku,kode,' . $id . ',id',
            'judul' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'kota' => 'required|max:255',
            'tahun' => 'required|max:255',
            'status' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'kategori_id' => 'required|exists:kategori,id',
        ], [
            'kode.unique' => 'Kode sudah digunakan, silahkan gunakan kode lain.'
        ]);

        $buku = Buku::find($id);
        $buku->kode = $validatedData['kode'];
        $buku->judul = $validatedData['judul'];
        $buku->penerbit = $validatedData['penerbit'];
        $buku->kota = $validatedData['kota'];
        $buku->tahun = $validatedData['tahun'];
        $buku->status = $validatedData['status'];
        $buku->pengarang = $validatedData['pengarang'];
        $buku->kategori_id = $validatedData['kategori_id'];
        $buku->save();

        return redirect()->back()->with('success', 'Buku berhasil diubah.');
    }

    public function hapus($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
