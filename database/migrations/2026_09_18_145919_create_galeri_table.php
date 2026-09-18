<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->increments('id_galeri');
            $table->string('judul', 50);
            $table->text('keterangan');
            $table->string('file', 100);
            $table->enum('kategori', ['Foto', 'Video']);
            $table->date('tanggal');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};