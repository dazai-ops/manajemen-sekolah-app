<?php

namespace Database\Factories;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{   
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_status' => $this->faker->randomElement(['draft', 'published', 'pending']),
            'post_title' => $this->faker->sentence(6, true),
            'post_body' => $this->faker->paragraph(10, true),
            'post_excerpt' => $this->faker->sentence(15, true),
            'post_slug' => $this->faker->slug,
            'post_author' => $this->faker->name,
            'post_image' => $this->faker->imageUrl(640, 480, 'cats', true),
        ];

    }
}
