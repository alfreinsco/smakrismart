<?php

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/peminjaman/api', function () {
    $data = Peminjaman::with('anggota')->with('buku')->where('status', 'Di Pinjam')->whereDate('tanggal_kembali', '<', now())->get()->map(function ($peminjaman) {
        $peminjaman->selisih_tanggal = selisihTanggal(now(), $peminjaman->tanggal_kembali);
        return $peminjaman;
    });
    return response()->json($data);
})->name('peminjaman.api');
