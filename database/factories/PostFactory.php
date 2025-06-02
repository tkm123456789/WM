<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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
        // Generate a fake image URL and get just the filename
        $imageUrl = fake()->imageUrl(400, 300);
        $imageName = basename($imageUrl);
        
        return [
            'title' => fake()->words(3, true),
            'image' => $imageName,
            'price' => fake()->numberBetween(5, 200),
            'description' => fake()->paragraph(2),
            'user_id' => User::first()->id
        ];
    }
}
