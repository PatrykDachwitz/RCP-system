<?php

declare(strict_types=1);

use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertSoftDeleted;

beforeEach(function () {
   DB::table('positions')->truncate();

    Position::factory()
        ->count(25)
       ->create();
});

describe('Test auth User for post route', function () {

    it('Can create position with super admin permission', function (User $user) {

        DB::table('positions')->truncate();

        $position = [
          'name' => "testPosition",
          'active' => true,
            'redirect' => route('positions.show', [
                'position' => 1
            ])
        ];

        $response = actingAs($user)
            ->postJson(route('positions.store'), $position)
            ->assertOk();

        $result = $response->getContent();

        dump($result);
        expect($result)
            ->toBeJson()
            ->json()
            ->toMatchArray($position);

        unset($position['redirect']);

        assertDatabaseHas('positions', $position);
    })->with('userSuperAdminPermission');

    it('Can`t create position without super admin permission', function (User $user) {

        $position = [
            'name' => "testPosition",
            'active' => true,
        ];

        actingAs($user)
            ->postJson(route('positions.store'), $position)
            ->assertStatus(403);

        assertDatabaseMissing('positions', $position);

    })->with('usersNotHavePermissionSuperAdmin');

    it('Can`t create because input has error value to valid', function (User $user, string $inputError) {

        $input = json_decode($inputError);

        $result = actingAs($user)
            ->postJson(route('positions.store'), [
                $input->name => $input->value
            ])
            ->assertStatus(422);

        $result = $result->getContent();

        expect($result)
            ->json()
            ->toHaveKey("errors.{$input->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequestPositions');
});

describe('Test auth User for put route', function () {

    it('Can update position with super admin permission', function (User $user) {

        $position = [
            'name' => "testPosition",
            'active' => true,
        ];

        $response = actingAs($user)
            ->putJson(route('positions.update', [
                'position' => 1
            ]), $position)
            ->assertOk();

        $result = $response->getContent();

        expect($result)
            ->toBeJson()
            ->json()
            ->toMatchArray($position);

        assertDatabaseHas('positions', $position);
    })->with('userSuperAdminPermission');

    it('Can`t update position without super admin permission', function (User $user) {

        $position = [
            'name' => "testPosition",
            'active' => true,
        ];

        actingAs($user)
            ->putJson(route('positions.update', [
                'position' => 1
            ]), $position)
            ->assertStatus(403);

        assertDatabaseMissing('positions', $position);

    })->with('usersNotHavePermissionSuperAdmin');

    it('Can`t update because input has error value to valid', function (User $user, string $inputError) {

        $input = json_decode($inputError);

        $result = actingAs($user)
            ->putJson(route('positions.update', [
                'position' => 1
            ]), [
                $input->name => $input->value
            ])
            ->assertStatus(422);

        $result = $result->getContent();

        expect($result)
            ->json()
            ->toHaveKey("errors.{$input->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequestPositions');
});

describe('Test auth user for destroy route', function () {

    it('Can delete position with super admin permission', function (User $user) {
       $positionId = 1;

       assertDatabaseHas('positions', [
           'id' => $positionId
       ]);

       actingAs($user)
           ->deleteJson(route('positions.destroy', [
               'position' => $positionId
           ]))
           ->assertStatus(100);

        assertSoftDeleted('positions', [
            'id' => $positionId
        ]);

    })->with('userSuperAdminPermission');

    it('Can delete position without super admin permission', function (User $user) {
        $positionId = 1;

        assertDatabaseHas('positions', [
            'id' => $positionId
        ]);

        actingAs($user)
            ->deleteJson(route('positions.destroy', [
                'position' => $positionId
            ]))
            ->assertStatus(403);

        assertDatabaseHas('positions', [
            'id' => $positionId
        ]);

    })->with('usersNotHavePermissionSuperAdmin');

});

describe('Test auth user for show route', function () {

    it('Can view for all permission', function (User $user) {
        $position = [
            'name',
            'active',
            'redirect',
        ];

        actingAs($user)
            ->getJson(route('positions.show', [
                'position' => 1
            ]))
            ->assertOk()
            ->assertJsonStructure($position);

    })->with('usersActive');

});

describe('Test auth user for index route', function () {

    it('Can view for all permission', function (User $user) {
        $position = [
            'name',
            'active',
            'redirect',
        ];

        $response = actingAs($user)
            ->getJson(route('positions.index'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    "*" => $position
                ]
            ])
            ->json('data');


        expect($response)
            ->toHaveCount(20);

    })->with('usersActive');

});
