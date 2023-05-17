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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('Nim',12)->primary();
            $table->string('Nama',30);
            $table->string('Tetala',50);
            $table->string('Kelas',10);
            $table->string('Jurusan',30);
            $table->string('Email')->unique();
            $table->integer('No_Handphone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
