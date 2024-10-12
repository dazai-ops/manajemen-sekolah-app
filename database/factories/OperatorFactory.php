<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Operator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operator>
 */
class OperatorFactory extends Factory
{   
    protected $model = Operator::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'operator_is_aktif' => '1',
            'operator_nama' => $this->faker->name(),
            'operator_username' => $this->faker->unique()->userName(),
            'operator_kode' => 'OP-' . strtoupper(Str::random(5)),
            'password' => bcrypt('password'),
            'operator_jenis_kelamin' => $this->faker->randomElement(['0', '1']),
            'operator_email' => $this->faker->unique()->safeEmail(),
            'operator_nomor_telepon' => $this->faker->optional()->phoneNumber(),
            'operator_alamat' => $this->faker->address(),
            'remember_token' => Str::random(10),
        ];
    }
}
