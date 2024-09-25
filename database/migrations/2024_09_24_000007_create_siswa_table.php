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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('siswa_nisn')->unique();
            $table->string('siswa_nama');
            $table->string('siswa_foto'); 
            $table->unsignedBigInteger('siswa_kelas_id');
            $table->string('siswa_tempat_lahir');
            $table->date('siswa_tanggal_lahir');
            $table->string('siswa_jenis_kelamin');
            $table->text('siswa_alamat'); 
            $table->text('siswa_nomor_telepon')->nullable(); 

            $table->foreign('siswa_kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
