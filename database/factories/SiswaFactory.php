<?php

namespace Database\Factories;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{   
    protected $model = Siswa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'siswa_nisn' => $this->faker->unique()->numerify('##########'),
            'siswa_nama' => $this->faker->name(),
            'siswa_foto' => '', // URL gambar acak
            'siswa_kelas_id' => Kelas::factory(),
            'siswa_tempat_lahir' => $this->faker->city(),
            'siswa_tanggal_lahir' => $this->faker->date('Y-m-d', '2000-01-01'),
            'siswa_jenis_kelamin' => $this->faker->randomElement(['0', '1']),
            'siswa_alamat' => $this->faker->address(),
            'siswa_nomor_telepon' => $this->faker->optional()->phoneNumber(),
        ];

    }
}
