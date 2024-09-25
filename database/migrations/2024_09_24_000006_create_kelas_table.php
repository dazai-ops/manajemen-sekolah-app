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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kelas_nama');
            $table->unsignedBigInteger('kelas_guru_wali_id');
            $table->unsignedBigInteger('kelas_tingkatan_id');

            $table->foreign('kelas_guru_wali_id')->references('id')->on('guru');
            $table->foreign('kelas_tingkatan_id')->references('id')->on('kelas_tingkatan')->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
