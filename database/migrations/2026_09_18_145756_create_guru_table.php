<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id_guru');
            $table->string('nama_guru', 40);
            $table->string('nip', 15);
            $table->string('mapel', 40);
            $table->string('foto', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};