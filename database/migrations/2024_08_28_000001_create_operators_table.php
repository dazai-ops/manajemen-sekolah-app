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
        Schema::create('operator', function (Blueprint $table) {
            $table->id();
            $table->string('operator_is_aktif')->default('1');
            $table->string('operator_nama');
            $table->string('operator_username')->unique();
            $table->string('operator_kode');
            $table->string('password', 255);
            $table->string('operator_jenis_kelamin');
            $table->string('operator_email')->unique();
            $table->string('operator_nomor_telepon')->unique()->nullable();
            $table->text('operator_alamat');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operator');
    }
};