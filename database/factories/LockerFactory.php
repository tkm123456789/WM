<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locker>
 */
class LockerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand = rand(0,2);
        $locs = ['allison', 'tech', 'norris'];
        $rand2 = rand(0,3);
        $sizes = ['small', 'medium', 'large', 'x-large'];
        return [
            'locker_size' => $sizes[$rand2],
            'location' => $locs[$rand],
            'locker_num' => rand(0,100),
            'status' => 'available'
        ];
    }
}
