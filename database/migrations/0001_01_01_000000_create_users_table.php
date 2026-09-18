<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username', 30);
            $table->string('password', 100);
            $table->enum('role', ['Admin', 'Operator']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};