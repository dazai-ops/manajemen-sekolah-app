<?php

namespace Database\Factories;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KelasFactory extends Factory
{   
    protected $model = Kelas::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kelas_nama' => $this->faker->word() . ' ' . $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'kelas_guru_wali_id' => Guru::factory(),
        ];
    }
}
