<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('judul', 'ASC')->get();
        return view('buku.index', compact('buku'));
    }

    public function tambah()
    {
        $kategori = Kategori::all();
        return view('buku.tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $buku = new Buku();
        $buku->judul = $validatedData['judul'];
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
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $buku = Buku::find($id);
        $buku->judul = $validatedData['judul'];
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
