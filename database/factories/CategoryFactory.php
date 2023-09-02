<?php

namespace Database\Factories;

use App\Models\Statistic;
use Illuminate\Database\Eloquent\Factories\Factory;

class categoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'slug' => fake()->slug,
        ];
    }
}
