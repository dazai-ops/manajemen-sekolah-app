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
        Schema::create('jadwal_list', function (Blueprint $table) {
            $table->id();
            
            // Foreign key ke kelas
            $table->unsignedBigInteger('kelas_id');
            
            // Foreign key ke guru
            $table->unsignedBigInteger('guru_id');
            
            // Foreign key ke mata pelajaran
            $table->unsignedBigInteger('mapel_id');
            
            
            // Hari dalam minggu
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']);
            
            // Jam mulai dan jam selesai
            $table->time('jam_mulai');
            $table->time('jam_selesai');
        
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('guru')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapel')->onUpdate('cascade')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_list');
    }
};
