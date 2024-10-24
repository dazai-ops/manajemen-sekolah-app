<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Operator;
use App\Models\KelasTingkatan;
use App\Models\Siswa;
use App\Models\Post;
use App\Models\Tag;
use App\Models\JadwalList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Operator::factory()->create([
            'operator_is_aktif' => '1',
            'operator_nama' => 'Administrator',
            'operator_username' => 'admin',
            'operator_kode' => 'OP-' . strtoupper(Str::random(4)),
            'password' => bcrypt('password'),
            'operator_jenis_kelamin' => '1',
            'operator_email' => 'admin@hello.com',
            'operator_nomor_telepon' => '089123456789',
            'operator_alamat' => 'Jalan Patimura 11, Klojen, Malang',
            // 'remember_token' => Str::random(10),
        ]);
        // Guru::factory(1000)->create();

    }
}
