<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Day>
 */
class DayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day' => rand(1, 31),
            'month' => rand(1, 12),
            'year' => rand(2000, 2100),
            'day_week' => rand(1, 7),
            'legislative_holiday' => rand(0, 1),
        ];
    }
}
