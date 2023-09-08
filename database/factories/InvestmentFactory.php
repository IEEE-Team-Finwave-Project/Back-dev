<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class investmentFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title'=>fake()->sentence,
            'price' => fake()->numberBetween(0, 100000) / 100,
            'image' => fake()->imageUrl(640, 480, 'animals', true),
            'description' => fake()->text(200),
            'user_id'=>User::factory()
        ];
    }
}
