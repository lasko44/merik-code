<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Exercise;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(), // Automatically creates a Category
            'language_id' => Language::factory(), // Automatically creates a Language
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
        ];
    }
}
