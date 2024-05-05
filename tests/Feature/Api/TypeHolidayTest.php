<?php
declare(strict_types=1);

use App\Models\TypeHoliday;
use App\Models\User;
use Database\Seeders\TypeHolidaySeeder;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->seed(TypeHolidaySeeder::class);

    TypeHoliday::factory()
        ->count(60)
        ->create();
});

describe('Test Auth User for index routing', function () {

    it('Check available Type current count is 30', function (User $user) {

        $result = actingAs($user)
            ->getJson(
                route('typeHolidays.index'),
            )
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    "*" => [
                        'name',
                        'active',
                        'name_holiday',
                    ]
                ]
            ])
        ->json('data');

        $languageIssetKey = array_keys(__('holidays'));
        $languageText = __('holidays');

        foreach ($result as $item) {
            if (in_array($item['name'], $languageIssetKey)) {
                if ($item['name_holiday'] === $languageText[$item['name']]) {
                    $currentValueLanguage = true;
                } else {
                    $currentValueLanguage = false;
                }
            } else {
                if ($item['name_holiday'] === $languageText['empty']) {
                    $currentValueLanguage = true;
                } else {
                    $currentValueLanguage = false;
                }
            }

            expect($currentValueLanguage)
                ->toBeTrue();
        }

        expect($result)
            ->toHaveCount(30);

    })->with('usersActive');

});
