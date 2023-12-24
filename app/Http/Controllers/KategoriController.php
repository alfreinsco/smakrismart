<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function tambah()
    {
        return view('kategori.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori|max:255',
            'deskripsi' => 'required',
        ], [
            'nama.required' => 'Nama kategori harus diisi.',
            'nama.unique' => 'Nama kategori sudah ada.',
            'nama.max' => 'Nama kategori tidak boleh melebihi 255 karakter.',
            'deskripsi.required' => 'Deskripsi kategori harus diisi.',
        ]);

        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function ubah($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.ubah', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:kategori,nama,' . $id . ',id|max:255',
            'deskripsi' => 'required',
        ], [
            'nama.required' => 'Nama kategori harus diisi.',
            'nama.unique' => 'Nama kategori sudah ada.',
            'nama.max' => 'Nama kategori tidak boleh melebihi 255 karakter.',
            'deskripsi.required' => 'Deskripsi kategori harus diisi.',
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

        return redirect()->back()->with('success', 'Kategori berhasil diubah.');
    }

    public function hapus($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
