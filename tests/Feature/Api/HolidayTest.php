<?php

declare(strict_types=1);

use App\Models\Holiday;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertSoftDeleted;

beforeEach(function () {
    DB::table('holidays')->truncate();
    Holiday::factory()
        ->count(40)
        ->create();
});

describe('Test auth user for store route', function () {
   it("Can create with super admin permissons", function (User $user) {
       $holiday = [
           'name' => "l4",
           'active' => true,
           'time_minutes' => (8 * 60),
       ];

       $result = actingAs($user)
           ->postJson(
               route('holidays.store'),
               $holiday
           )
           ->assertOk();

       $content = $result->getContent();

       expect($content)
           ->toBeJson()
           ->json()
           ->toMatchArray($holiday);

       assertDatabaseHas('holidays', $holiday);
   })->with('userSuperAdminPermission');
   it("Can`t create without super admin permissons", function (User $user) {
       $holiday = [
           'name' => "l4",
           'active' => true,
           'time_minutes' => (8 * 60),
       ];

       actingAs($user)
           ->postJson(
               route('holidays.store'),
               $holiday
           )
           ->assertStatus(403);

       assertDatabaseMissing('holidays', $holiday);
   })->with('usersNotHavePermissionSuperAdmin');
   it("Can`t create with super admin permissons because inputs have errors", function (User $user, string $errorInputs) {

       $input = json_decode($errorInputs);

        $result = actingAs($user)
            ->postJson(
                route('holidays.store'),[
                    $input->name => $input->value
                ]
            )
            ->assertStatus(422);

        $content = $result->getContent();

        expect($content)
            ->json()
            ->toHaveKey("errors.{$input->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequestHolidays');
});

describe('Test auth user for update route', function () {
   it("Can update with super admin permissons", function (User $user) {
       $holiday = [
           'name' => "l4",
           'active' => true,
           'time_minutes' => (8 * 60),
       ];

       $result = actingAs($user)
           ->putJson(
               route('holidays.update', [
                   'holiday' => 1
               ]),
               $holiday
           )
           ->assertOk();

       $content = $result->getContent();

       expect($content)
           ->toBeJson()
           ->json()
           ->toMatchArray($holiday);

       assertDatabaseHas('holidays', $holiday);
   })->with('userSuperAdminPermission');
   it("Can`t update without super admin permissons", function (User $user) {
       $holiday = [
           'name' => "l4",
           'active' => true,
           'time_minutes' => (8 * 60),
       ];

       actingAs($user)
           ->putJson(
               route('holidays.update', [
                   'holiday' => 1
               ]),
               $holiday
           )
           ->assertStatus(403);

       assertDatabaseMissing('holidays', $holiday);
   })->with('usersNotHavePermissionSuperAdmin');
   it("Can update with super admin permissons because inputs have errors", function (User $user, string $errorInputs) {

       $input = json_decode($errorInputs);

        $result = actingAs($user)
            ->putJson(
                route('holidays.update', [
                    'holiday' => 1
                ]),[
                    $input->name => $input->value
                ]
            )
            ->assertStatus(422);

        $content = $result->getContent();

        expect($content)
            ->json()
            ->toHaveKey("errors.{$input->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequestHolidays');
});

describe('Test auth user for index route', function () {
    it('Can view 20 holidays without super admin permisson or with super admin permisson', function (User $user) {
        $holiday = [
            'name',
            'active',
            'time_minutes',
            'redirect',
        ];

        $result = actingAs($user)
            ->getJson(route('holidays.index'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    "*" => $holiday
                ]
            ])
            ->json('data');

        expect($result)
            ->toHaveCount(20);

    })->with('usersActive');

});

describe('Test auth user for show route', function () {
    it('Can view holiday without super admin permisson or with super admin permisson', function (User $user) {
        $holiday = [
            'name',
            'active',
            'time_minutes',
            'redirect',
        ];

        $result = actingAs($user)
            ->getJson(route('holidays.show', [
                'holiday' => 1
            ]))
            ->assertOk()
            ->assertJsonStructure($holiday)
            ->json();

        unset($result['redirect']);
        assertDatabaseHas('holidays', $result);

    })->with('usersActive');

});


describe('Test auth user destroy route', function () {
   it('Can delete holiday with super admin permission', function (User $user) {
       $deleteHoliday = [
           'id' => 1
       ];

       assertDatabaseHas('holidays', $deleteHoliday);

       actingAs($user)
           ->deleteJson(route('holidays.destroy', [
               'holiday' => 1
           ]))->assertStatus(100);

       assertSoftDeleted('holidays', $deleteHoliday);

   })->with('userSuperAdminPermission');

   it('Can`t delete holiday without super admin permission', function (User $user) {
       $deleteHoliday = [
           'id' => 1
       ];

       assertDatabaseHas('holidays', $deleteHoliday);

       actingAs($user)
           ->deleteJson(route('holidays.destroy', [
               'holiday' => 1
           ]))->assertStatus(403);

       assertDatabaseHas('holidays', $deleteHoliday);

   })->with('usersNotHavePermissionSuperAdmin');

});
