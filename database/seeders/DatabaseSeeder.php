<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Operator;
use App\Models\KelasTingkatan;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // Main operator
        Operator::factory()->create([
            'operator_nama' => 'Operator 1',
            'operator_username' => 'operator1',
            'operator_email' => 'operator@example.com',
            'password' => Hash::make('password'),
            'operator_jenis_kelamin' => 1,
            'operator_alamat' => 'Jalan Klojen 15b, Malang',
            'operator_nomor_telepon' => '081234567890',
            'operator_kode' => 'OPR1',
        ]);

        // Mata Pelajaran
        Mapel::factory()->create([
            'mapel_nama' => 'Matematika',
        ]);

        Mapel::factory()->create([
            'mapel_nama' => 'Bahasa Inggris',
        ]);

        // Guru
        Guru::factory()->create([
            'guru_nama' => 'Guru 1',
            'guru_nip' => '567890984378654045',
            'guru_tempat_lahir' => 'Malang',
            'guru_tanggal_lahir' => '2000-01-01',
            'guru_jenis_kelamin' => 1,
            'guru_alamat' => 'Jalan Klojen 15b, Malang',
            'guru_nomor_telepon' => '081234567890',
            'guru_foto' => '',
        ]);

        Guru::factory()->create([
            'guru_nama' => 'Guru 2',
            'guru_nip' => '567890984309786678',
            'guru_tempat_lahir' => 'Pasuruan',
            'guru_tanggal_lahir' => '1990-02-05',
            'guru_jenis_kelamin' => 1,
            'guru_alamat' => 'Jalan Besari, Surabaya',
            'guru_nomor_telepon' => '081237347890',
            'guru_foto' => '',
        ]);

        Guru::factory()->create([
            'guru_nama' => 'Guru 1',
            'guru_nip' => '568099884309786903',
            'guru_tempat_lahir' => 'Surabaya',
            'guru_tanggal_lahir' => '2001-06-09',
            'guru_jenis_kelamin' => 1,
            'guru_alamat' => 'Perumahan Biru Permai, Malang',
            'guru_nomor_telepon' => '08123784907890',
            'guru_foto' => '',
        ]);

        // Kelas tingkatan
        KelasTingkatan::factory()->create([
            'kelas_tingkatan' => 'X',
        ]);
        KelasTingkatan::factory()->create([
            'kelas_tingkatan' => 'XI',
        ]);
        KelasTingkatan::factory()->create([
            'kelas_tingkatan' => 'XII',
        ]);

        // Kelas
        Kelas::factory()->create([
            'kelas_nama' => 'IPA 1',
            'kelas_tingkatan_id' => '1',
            'kelas_guru_wali_id' => '1',

        ]);
        Kelas::factory()->create([
            'kelas_nama' => 'IPA 2',
            'kelas_tingkatan_id' => '1',
            'kelas_guru_wali_id' => '2',
        ]);
        Kelas::factory()->create([
            'kelas_nama' => 'IPS 2',
            'kelas_tingkatan_id' => '3',
            'kelas_guru_wali_id' => '1',
        ]);

        Siswa::factory()->create([
            'siswa_nisn' => '123456789',
            'siswa_nama' => 'Siswa 1',
            'siswa_foto' => '',
            'siswa_kelas_id' => '1',
            'siswa_tempat_lahir' => 'Malang',
            'siswa_tanggal_lahir' => '2008-01-01',
            'siswa_jenis_kelamin' => 1,
            'siswa_alamat' => 'Jalan Besari, Surabaya',
            'siswa_nomor_telepon' => '081237347890',
        ]);

        Siswa::factory()->create([
            'siswa_nisn' => '098765',
            'siswa_nama' => 'Siswa 2',
            'siswa_foto' => '',
            'siswa_kelas_id' => '3',
            'siswa_tempat_lahir' => 'Pasuruan',
            'siswa_tanggal_lahir' => '2007-07-01',
            'siswa_jenis_kelamin' => 0,
            'siswa_alamat' => 'Bunga asrih klojen, Malang',
            'siswa_nomor_telepon' => '08123738348',
        ]);

    }
}
