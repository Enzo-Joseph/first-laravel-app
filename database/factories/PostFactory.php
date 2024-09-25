<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // title content author
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            'category_id' => Category::factory(),
            'body' => fake()->text(),
            'author_id' => User::factory(),
        ];
    }
}
