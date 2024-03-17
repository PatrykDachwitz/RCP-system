<?php
declare(strict_types=1);
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presence>
 */
class PresenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 50),
            'month' => rand(1, 12),
            'year' => rand(2012, 2023),
            'time_to_work' => rand(24 * 60, 60 * 60),
            'time_completed' => rand(24 * 60, 60 * 60),
            'time_worked' => rand(24 * 60, 60 * 60),
            'time_on_sick_leave' => rand(24 * 60, 60 * 60),
            'time_on_vacation' => rand(24 * 60, 60 * 60)
        ];
    }
}
