<?php

namespace Database\Factories;
use App\Models\Guru;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{   
    protected $model = Guru::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'guru_nama' => $this->faker->name(),
            'guru_nip' => $this->faker->unique()->numerify('##################'),
            'guru_jenis_kelamin' => $this->faker->randomElement(['0', '1']),
            'guru_nomor_telepon' => $this->faker->optional()->phoneNumber(),
            'guru_foto' => '',
            'guru_tempat_lahir' => $this->faker->city(),
            'guru_tanggal_lahir' => $this->faker->date('Y-m-d', '2000-01-01'),
            'guru_alamat' => $this->faker->address(),
        ];

    }
}
