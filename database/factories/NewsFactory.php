<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'summary' => $this->faker->sentence(15),
            'description' => $this->faker->paragraph(5),
            'slug' => $this->faker->slug,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
