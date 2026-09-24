<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_prestasi', 100);
            $table->text('deskripsi');
            $table->string('foto', 100)->nullable();
            $table->string('tahun_ajaran', 20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};