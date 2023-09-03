<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_spending'=>fake()->numberBetween(0, 100000) / 100,
            'total_savings'=>fake()->numberBetween(0, 100000) / 100,
            'current_balance'=>fake()->numberBetween(0, 100000) / 100,
            'user_id'=>User::factory(),
            'start_date'=>fake()->date,
            'end_date'=>fake()->date,
        ];
    }
}
