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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('guru_nama');
            $table->string('guru_nip')->unique();
            $table->string('guru_jenis_kelamin');
            $table->string('guru_nomor_telepon')->unique()->nullable(); 
            $table->string('guru_foto')->nullable(); 
            $table->string('guru_tempat_lahir');
            $table->date('guru_tanggal_lahir');
            $table->text('guru_alamat'); 

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
