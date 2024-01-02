<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::name('peminjaman')->prefix('peminjaman')->group(function () {
        Route::get('/', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('.index');
        Route::post('/', [App\Http\Controllers\PeminjamanController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\PeminjamanController::class, 'tambah'])->name('.tambah');
        Route::post('/tambah', [App\Http\Controllers\PeminjamanController::class, 'store']);
        Route::get('/kurang', [App\Http\Controllers\PeminjamanController::class, 'kurang'])->name('.kurang');
        Route::post('/kurang', [App\Http\Controllers\PeminjamanController::class, 'pull']);
        Route::get('/ubah/{id}', [App\Http\Controllers\PeminjamanController::class, 'ubah'])->name('.ubah');
        Route::post('/ubah/{id}', [App\Http\Controllers\PeminjamanController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\PeminjamanController::class, 'hapus'])->name('.hapus');
        Route::post('/status', [App\Http\Controllers\PeminjamanController::class, 'status'])->name('.status');

        Route::post('/anggota', [App\Http\Controllers\PeminjamanController::class, 'anggota'])->name('.anggota');
        Route::post('/anggotap', [App\Http\Controllers\PeminjamanController::class, 'anggotap'])->name('.anggotap');
        Route::post('/buku', [App\Http\Controllers\PeminjamanController::class, 'buku'])->name('.buku');
    });

    Route::name('anggota')->prefix('anggota')->group(function () {
        Route::get('/', [App\Http\Controllers\AnggotaController::class, 'index'])->name('.index');
        Route::get('/tambah', [App\Http\Controllers\AnggotaController::class, 'tambah'])->name('.tambah');
        Route::post('/tambah', [App\Http\Controllers\AnggotaController::class, 'store']);
        Route::get('/ubah/{id}', [App\Http\Controllers\AnggotaController::class, 'ubah'])->name('.ubah');
        Route::post('/ubah/{id}', [App\Http\Controllers\AnggotaController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\AnggotaController::class, 'hapus'])->name('.hapus');
        Route::post('/buatKodeBatang', [App\Http\Controllers\AnggotaController::class, 'buatKodeBatang'])->name('.buatKodeBatang');
    });

    Route::name('kategori')->prefix('kategori')->group(function () {
        Route::get('/', [App\Http\Controllers\KategoriController::class, 'index'])->name('.index');
        Route::get('/tambah', [App\Http\Controllers\KategoriController::class, 'tambah'])->name('.tambah');
        Route::post('/tambah', [App\Http\Controllers\KategoriController::class, 'store']);
        Route::get('/ubah/{id}', [App\Http\Controllers\KategoriController::class, 'ubah'])->name('.ubah');
        Route::post('/ubah/{id}', [App\Http\Controllers\KategoriController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\KategoriController::class, 'hapus'])->name('.hapus');
    });

    Route::name('buku')->prefix('buku')->group(function () {
        Route::get('/', [App\Http\Controllers\BukuController::class, 'index'])->name('.index');
        Route::get('/tambah', [App\Http\Controllers\BukuController::class, 'tambah'])->name('.tambah');
        Route::post('/tambah', [App\Http\Controllers\BukuController::class, 'store']);
        Route::get('/ubah/{id}', [App\Http\Controllers\BukuController::class, 'ubah'])->name('.ubah');
        Route::post('/ubah/{id}', [App\Http\Controllers\BukuController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\BukuController::class, 'hapus'])->name('.hapus');
    });

    Route::name('kunjungan')->prefix('kunjungan')->group(function () {
        Route::get('/', [App\Http\Controllers\KunjunganController::class, 'index'])->name('.index');
        Route::post('/tambah', [App\Http\Controllers\KunjunganController::class, 'store'])->name('.store');
        Route::get('/ubah/{id}', [App\Http\Controllers\KunjunganController::class, 'ubah'])->name('.ubah');
        Route::get('/hapus/{id}', [App\Http\Controllers\KunjunganController::class, 'hapus'])->name('.hapus');
    });

    Route::name('pengguna')->prefix('pengguna')->group(function () {
        Route::get('/', [App\Http\Controllers\PenggunaController::class, 'index'])->name('.index');
        Route::get('/tambah', [App\Http\Controllers\PenggunaController::class, 'tambah'])->name('.tambah');
        Route::post('/tambah', [App\Http\Controllers\PenggunaController::class, 'store']);
        Route::get('/ubah/{id}', [App\Http\Controllers\PenggunaController::class, 'ubah'])->name('.ubah');
        Route::post('/ubah/{id}', [App\Http\Controllers\PenggunaController::class, 'update']);
        Route::get('/hapus/{id}', [App\Http\Controllers\PenggunaController::class, 'hapus'])->name('.hapus');
    });
});

Auth::routes();
