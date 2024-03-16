<?php
declare(strict_types=1);

use App\Models\Presence;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertSoftDeleted;

beforeEach(function () {
    DB::table('presences')
        ->truncate();

    Presence::factory()
        ->count(40)
    ->create();
});

describe('Test auth user post route', function () {

    it('Can create presence with super admin permission', function (User $user) {

        $presence = [
            'user_id' => 1,
            'month' => 1,
            'year' => 2023,
            'time_to_work' => 120,
            'time_completed' => 120,
            'time_worked' => 120,
            'time_on_sick_leave' => 120,
            'time_on_vacation' => 120,
            'redirect' => route('presences.show', [
                'presence' => 1
            ])
        ];

        DB::table('presences')
            ->truncate();

        $response = actingAs($user)
            ->postJson(route('presences.store'), $presence)
            ->assertOk();

        $resultContent = $response->getContent();

        expect($resultContent)
            ->toBeJson()
            ->json()
            ->toMatchArray($presence);

        unset($presence['redirect']);

        assertDatabaseHas('presences', $presence);

    })->with('userSuperAdminPermission');

    it('Can`t create presence without super admin permission', function (User $user) {

        $presence = [
            'user_id' => 1,
            'month' => 1,
            'year' => 2023,
            'time_to_work' => 120,
            'time_completed' => 120,
            'time_worked' => 120,
            'time_on_sick_leave' => 120,
            'time_on_vacation' => 120
        ];

        DB::table('presences')
            ->truncate();

        actingAs($user)
            ->postJson(route('presences.store'), $presence)
            ->assertStatus(403);

        assertDatabaseMissing('presences', $presence);

    })->with('usersNotHavePermissionSuperAdmin');

    it('Can`t create presence because input is not valid', function (User $user, string $input) {

        $input = json_decode($input);

        $response = actingAs($user)
            ->postJson(route('presences.store'), [
                $input->name => $input->value
            ])
            ->assertStatus(422);

        $responseContent = $response->getContent();

        expect($responseContent)
            ->toBeJson()
            ->json()
            ->toHaveKey("errors.{$input->name}");
    })->with('userSuperAdminPermission', 'failedInputsRequestPresence');
});

describe('Test auth user update route', function () {

    it('Can update presence with super admin permission', function (User $user) {

        $presence = [
            'user_id' => 1,
            'month' => 1,
            'year' => 2023,
            'time_to_work' => 120,
            'time_completed' => 120,
            'time_worked' => 120,
            'time_on_sick_leave' => 120,
            'time_on_vacation' => 120,
            'redirect' => route('presences.show', [
                'presence' => 1
            ])
        ];

        $response = actingAs($user)
            ->putJson(route('presences.update', [
                'presence' => 1
            ]), $presence)
            ->assertOk();

        $resultContent = $response->getContent();

        expect($resultContent)
            ->toBeJson()
            ->json()
            ->toMatchArray($presence);

        unset($presence['redirect']);

        assertDatabaseHas('presences', $presence);

    })->with('userSuperAdminPermission');

    it('Can`t create presence without super admin permission', function (User $user) {

        $presence = [
            'user_id' => 1,
            'month' => 1,
            'year' => 2023,
            'time_to_work' => 120,
            'time_completed' => 120,
            'time_worked' => 120,
            'time_on_sick_leave' => 120,
            'time_on_vacation' => 120
        ];

        actingAs($user)
            ->putJson(route('presences.update', [
                'presence' => 1
            ]), $presence)
            ->assertStatus(403);

        assertDatabaseMissing('presences', $presence);

    })->with('usersNotHavePermissionSuperAdmin');

    it('Can`t create presence because input is not valid', function (User $user, string $input) {

        $input = json_decode($input);

        $response = actingAs($user)
            ->putJson(route('presences.update', [
                'presence' => 1
            ]), [
                $input->name => $input->value
            ])
            ->assertStatus(422);

        $responseContent = $response->getContent();

        expect($responseContent)
            ->toBeJson()
            ->json()
            ->toHaveKey("errors.{$input->name}");
    })->with('userSuperAdminPermission', 'failedInputsRequestPresence');
});

describe('Test auth user index route', function () {

    it('Can view presences with super admin permission', function (User $user) {
        $presence = [
            'user_id',
            'month',
            'year',
            'time_to_work',
            'time_completed',
            'time_worked',
            'time_on_sick_leave',
            'time_on_vacation',
            'redirect'
        ];

        $response = actingAs($user)
            ->getJson(route('presences.index'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    "*" => $presence
                ]
            ])
            ->json('data');


        expect($response)
            ->toHaveCount(20);

    })->with('userSuperAdminPermission');

    it('Can`t view presences without super admin permission', function (User $user) {

        actingAs($user)
            ->getJson(route('presences.index'))
            ->assertStatus(403);

    })->with('usersNotHavePermissionSuperAdmin');

});


describe('Test auth user for destroy route', function () {

    it('Can delete presences with super admin permission', function (User $user) {

        assertDatabaseHas('presences', [
            'id' => 1
        ]);

        actingAs($user)
            ->deleteJson(route('presences.destroy', [
                'presence' => 1
            ]))
            ->assertStatus(100);

        assertSoftDeleted('presences', [
            'id' => 1
        ]);

    })->with('userSuperAdminPermission');

    it('Can`t delete presences without super admin permission', function (User $user) {

        assertDatabaseHas('presences', [
            'id' => 1
        ]);

        actingAs($user)
            ->deleteJson(route('presences.destroy', [
                'presence' => 1
            ]))
            ->assertStatus(403);

        assertDatabaseHas('presences', [
            'id' => 1
        ]);

    })->with('usersNotHavePermissionSuperAdmin');

});
