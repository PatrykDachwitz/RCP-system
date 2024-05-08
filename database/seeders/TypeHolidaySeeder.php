<?php

namespace Database\Seeders;

use App\Models\TypeHoliday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeHolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $availableHolidays = [
            'holiday-leave',
            'parental-leave',
            'maternity-leave',
            'paternity-leave',
            'on-demand-leave',
            'special-leave',
            'training-leave',
            'unpaid-leave',
            'l4-leave'
        ];

        DB::table('type_holidays')->truncate();

        foreach ($availableHolidays as $holiday) {
            TypeHoliday::create([
                'name' => $holiday,
                'active' => true,
            ]);
        }
    }
}
