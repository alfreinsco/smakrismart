<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('anggota_id');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('status')->nullable()->default('Di Pinjam');
            $table->date('tanggal_terima')->nullable();
            $table->foreign('buku_id')->references('id')->on('buku');
            $table->foreign('anggota_id')->references('id')->on('anggota');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
