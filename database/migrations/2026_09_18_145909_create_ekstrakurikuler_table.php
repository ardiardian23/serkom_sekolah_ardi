<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->increments('id_ekskul');
            $table->string('nama_ekskul', 40);
            $table->string('pembina', 40);
            $table->string('jadwal_latihan', 40);
            $table->text('deskripsi');
            $table->string('gambar', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikuler');
    }
};