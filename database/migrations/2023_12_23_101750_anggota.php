<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nomor_identitas');
            $table->string('nomor_telepon');
            $table->string('jabatan');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->string('alamat');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
