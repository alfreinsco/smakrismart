<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'pengguna' => User::get()
        ]);
    }

    public function tambah()
    {
        return view('user.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'max:255'],
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'username.required' => 'Kolom username harus diisi.',
            'username.regex' => 'Format username hanya boleh terdiri dari huruf tanpa spasi atau karakter lainnya.',
            'username.string' => 'Format username tidak valid.',
            'username.max' => 'Username tidak boleh melebihi 255 karakter.',
            'username.unique' => 'Username sudah digunakan, harap pilih username lain.',
            'password.required' => 'Kolom password harus diisi.',
            'password.string' => 'Format password tidak valid.',
            'password.max' => 'Password tidak boleh melebihi 255 karakter.',
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Berhasil menambahkan pengguna baru.');
    }

    public function ubah($id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('user.ubah', [
            'pengguna' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:255', 'unique:users,username,' . $id . ',id'],
            'password' => ['nullable', 'string', 'max:255'],
        ], [
            'nama.required' => 'Kolom nama harus diisi.',
            'username.required' => 'Kolom username harus diisi.',
            'username.regex' => 'Format username hanya boleh terdiri dari huruf tanpa spasi atau karakter lainnya.',
            'username.string' => 'Format username tidak valid.',
            'username.max' => 'Username tidak boleh melebihi 255 karakter.',
            'username.unique' => 'Username sudah digunakan, harap pilih username lain.',
            'password.required' => 'Kolom password harus diisi.',
            'password.string' => 'Format password tidak valid.',
            'password.max' => 'Password tidak boleh melebihi 255 karakter.',
        ]);

        $user->nama = $request->nama;
        $user->username = $request->username;

        // Periksa apakah ada perubahan pada password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Berhasil mengubah data pengguna.');
    }


    public function hapus($id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $data->delete();

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil dihapus.');
    }
}
