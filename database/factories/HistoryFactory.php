<?php
declare(strict_types=1);
namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day_id' => rand(0, 31),
            'user_id' => rand(0, 31),
            'work_minutes' => rand(0, 31),
            'start_work' => Carbon::now(),
            'end_work' => Carbon::now(),
        ];
    }
}
