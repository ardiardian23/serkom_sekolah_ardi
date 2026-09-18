<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->increments('id_berita');
            $table->string('judul', 50);
            $table->text('isi');
            $table->date('tanggal');
            $table->string('gambar', 100);
            $table->enum('status', ['Publish', 'Draft']);
            $table->unsignedInteger('id_user');

            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('user')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};