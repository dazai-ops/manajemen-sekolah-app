<?php

namespace Database\Factories;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\JadwalList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalList>
 */
class JadwalListFactory extends Factory
{   
    protected $model = JadwalList::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kelas_id' => Kelas::factory(),
            'guru_id' => Guru::factory(),
            'mapel_id' => Mapel::factory(),
            'hari' => $this->faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
            'jam_mulai' => $this->faker->time('H:i', '08:00'),
            'jam_selesai' => $this->faker->time('H:i', '10:00'),
        ];
    }
}
