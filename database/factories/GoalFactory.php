<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goal>
 */
class GoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence,
            'description'=>fake()->text(200),
            'amount_of_money'=>fake()->numberBetween(0, 100000) / 100,
            'money_limit'=>fake()->numberBetween(0, 100000) / 100,
            'user_id'=>User::factory(),
        ];
    }
}
