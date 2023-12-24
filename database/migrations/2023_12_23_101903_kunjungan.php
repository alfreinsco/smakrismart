<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anggota_id');
            $table->dateTime('waktu_kunjung');
            $table->foreign('anggota_id')->references('id')->on('anggota');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kunjungan');
    }
};
