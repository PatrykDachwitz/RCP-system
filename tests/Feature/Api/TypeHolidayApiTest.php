<?php
declare(strict_types=1);

use App\Models\TypeHoliday;
use App\Models\User;
use function Pest\Laravel\actingAs;

beforeEach(function () {
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
                        'active'
                    ]
                ]
            ])
        ->json('data');


        expect($result)
            ->toHaveCount(30);

    })->with('usersActive');

});
