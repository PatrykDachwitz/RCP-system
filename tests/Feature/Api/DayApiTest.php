<?php
declare(strict_types=1);

use App\Models\User;
use App\Models\Day;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertSoftDeleted;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

beforeEach(function () {
    Day::factory()
        ->count(60)
        ->create();
});

describe('Test not Auth user', function () {

    it('Check index route', function () {
        getJson(route('days.index'))
            ->assertStatus(401);
    });

    it('Check update route', function () {
        putJson(route('days.update', [
            'day' => 1
        ]))
            ->assertStatus(401);
    });

    it('Check destroy route', function () {
        deleteJson(route('days.destroy', [
            'day' => 1
        ]))
            ->assertStatus(401);
    });

    it('Check show route', function () {
        getJson(route('days.show', [
            'day' => 1
        ]))
            ->assertStatus(401);
    });


    it('Check store route', function () {
        postJson(route('days.store'))
            ->assertStatus(401);
    });
});

describe('Test not active user', function () {


    it('Check index route', function (User $user) {
        actingAs($user)
        ->getJson(route('days.index'))
            ->assertStatus(403);
    })->with('userNotActive');

    it('Check update route', function (User $user) {
        actingAs($user)
        ->putJson(route('days.update', [
            'day' => 1
        ]))
            ->assertStatus(403);
    })->with('userNotActive');

    it('Check destroy route', function (User $user) {
        actingAs($user)
        ->deleteJson(route('days.destroy', [
            'day' => 1
        ]))
            ->assertStatus(403);
    })->with('userNotActive');

    it('Check show route', function (User $user) {
        actingAs($user)
        ->getJson(route('days.show', [
            'day' => 1
        ]))
            ->assertStatus(403);
    })->with('userNotActive');


    it('Check store route', function (User $user) {
        actingAs($user)
        ->postJson(route('days.store'))
            ->assertStatus(403);
    })->with('userNotActive');
});

describe('Test Auth User for create routing', function () {

   it('Check create day with correct permissions user', function (User $user) {
       $day = [
           'day' => 1,
           'id' => 1,
           'month' => 12,
           'year' => 2024,
           'day_week' => 2,
           'legislative_holiday' => false,
           'redirect' => route('days.show', [
               'day' => 1
           ])
       ];


       DB::table('days')->truncate();

       $result = actingAs($user)
           ->postJson(
               route('days.store'),
           $day
           )->assertOk();

       $contentResult = $result->getContent();

       expect($contentResult)
           ->toBeJson()
           ->json()
           ->toMatchArray($day);
       unset($day['redirect']);

       assertDatabaseHas('days', $day);
   })->with('userSuperAdminPermission');

   it('Check request failed value for inputs', function (User $user, string $failedInputs) {
       $failedInput = json_decode($failedInputs);
        $result = actingAs($user)
            ->postJson(route('days.store'), [
                $failedInput->name => $failedInput->value
            ])->assertStatus(422);

        $contentResult = $result->getContent();

        expect($contentResult)
            ->json()
            ->toHaveKey("errors.{$failedInput->name}");

   })->with('userSuperAdminPermission', 'failedInputsRequest');

   it('Check correct gate for create route only for super admin', function (User $user) {
       $day = [
           'day' => 1,
           'id' => 1,
           'month' => 12,
           'year' => 2024,
           'day_week' => 2,
           'legislative_holiday' => false,
           'redirect' => route('days.show', [
               'day' => 1
           ])
       ];

       actingAs($user)
           ->postJson(
               route('days.store'),
               $day
           )->assertStatus(403);
   })->with('usersNotHavePermissionSuperAdmin');
});

describe('Test Auth user for delete user', function () {

    it('Check delete day with correct permissions user', function (User $user) {

        actingAs($user)
            ->deleteJson(
                route('days.destroy', [
                    'day' => 1
                ]),
            )->assertStatus(100);

        assertSoftDeleted('days', [
            'id' => 1
        ]);

    })->with('userSuperAdminPermission');

    it('Check correct gate for delete route only for super admin', function (User $user) {

        actingAs($user)
            ->deleteJson(
                route('days.destroy', [
                    'day' => 1
                ])
            )->assertStatus(403);

    })->with('usersNotHavePermissionSuperAdmin');

});

describe('Test Auth User for update routing', function () {

    it('Check update day with correct permissions user', function (User $user) {
        $day = [
            'day' => 1,
            'id' => 1,
            'month' => 12,
            'year' => 2024,
            'day_week' => 2,
            'legislative_holiday' => false,
            'redirect' => route('days.show', [
                'day' => 1
            ])
        ];


        $result = actingAs($user)
            ->putJson(
                route('days.update', [
                    'day' => 1
                ]),
                $day
            )->assertOk();

        $contentResult = $result->getContent();

        expect($contentResult)
            ->toBeJson()
            ->json()
            ->toMatchArray($day);

        unset($day['redirect']);

        assertDatabaseHas('days', $day);
    })->with('userSuperAdminPermission');

    it('Check request failed value for inputs update', function (User $user, string $failedInputs) {
        $failedInput = json_decode($failedInputs);
        $result = actingAs($user)
            ->putJson(route('days.update', [
                'day' => 1
            ]), [
                $failedInput->name => $failedInput->value
            ])->assertStatus(422);

        $contentResult = $result->getContent();

        expect($contentResult)
            ->json()
            ->toHaveKey("errors.{$failedInput->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequest');

    it('Check correct gate for update route only for super admin', function (User $user) {
        $day = [
            'day' => 1,
            'id' => 1,
            'month' => 12,
            'year' => 2024,
            'day_week' => 2,
            'legislative_holiday' => false,
            'redirect' => route('days.show', [
                'day' => 1
            ])
        ];

        actingAs($user)
            ->putJson(
                route('days.update', [
                    'day' => 1
                ]),
                $day
            )->assertStatus(403);
    })->with('usersNotHavePermissionSuperAdmin');
});

describe('Test Auth User for show routing', function () {
    it('Test show isset structure', function (User $user) {

        $day = ['id' => 65,
            'day' => 1,
            'month' => 12,
            'year' => 2024,
            'day_week' => 2,
            'legislative_holiday' => false];

       Day::factory()->create($day);

      $result = actingAs($user)
          ->getJson(route('days.show', [
              'day' => 65
          ]))
      ->assertOk();

      $content = $result->getContent();

      expect($content)
          ->toBeJson()
          ->json()
          ->toMatchArray($day);

    })->with('usersActive');

    it("Test not isset Day", function (User $user) {
       actingAs($user)
           ->getJson(route('days.show', [
               'day' => 120
           ]))
           ->assertStatus(404);

    })->with('usersActive');

});

describe('Test Auth User for index routing', function () {

    it('Check create day with correct permissions user', function (User $user) {

        $result = actingAs($user)
            ->getJson(
                route('days.index'),
            )
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    "*" => [
                        'day',
                        'id',
                        'month',
                        'year',
                        'day_week',
                        'legislative_holiday',
                        'redirect'
                    ]
                ]
            ])
        ->json('data');


        expect($result)
            ->toHaveCount(40);

    })->with('usersActive');

});
