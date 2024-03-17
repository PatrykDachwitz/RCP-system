<?php
declare(strict_types=1);

use App\Models\History;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertSoftDeleted;


beforeEach(function () {
    DB::table('histories')
        ->truncate();
    History::factory()
        ->count(40)
        ->create();
});

describe('Test auth user for index routing', function () {

    it('Can view all histories row user with super admin permission', function (User $user) {

        $result = actingAs($user)
            ->getJson(route('histories.index'))
            ->assertOk()
            ->assertJsonStructure()
            ->json('data');

        expect($result)
            ->toHaveCount(20);

    })->with('userSuperAdminPermission');

    it('Can`t view all histories row user without super admin permission', function (User $user) {

        actingAs($user)
            ->getJson(route('histories.index'))
            ->assertStatus(403);

    })->with('usersNotHavePermissionSuperAdmin');
});

describe('Test auth user for create Route', function () {
   it('Can create history for other user with super admin permission', function (User $user) {
       $history = [
            'id' => 1,
            'day_id' => 1,
            'user_id' => 1,
            'work_minutes' => 1,
            'start_work' => date("Y-m-d H:i:s"),
            'end_work' => date("Y-m-d H:i:s"),
       ];

       DB::table('histories')->truncate();

       $result = actingAs($user)
           ->postJson(route('histories.store'), $history)
           ->assertOk();

       $content = $result->getContent();

       expect($content)
           ->toBeJson()
           ->json()
           ->toMatchArray($history);

       assertDatabaseHas('histories', $history);

   })->with('userSuperAdminPermission');
   it('Can create history for other user with super admin permission but not add work_minutes input is not required', function (User $user) {
        $history = [
            'id' => 1,
            'day_id' => 1,
            'user_id' => 1,
            'start_work' => date("Y-m-d H:i:s"),
            'end_work' => date("Y-m-d H:i:s"),
        ];

        DB::table('histories')->truncate();

        $result = actingAs($user)
            ->postJson(route('histories.store'), $history)
            ->assertOk();

        $content = $result->getContent();

        expect($content)
            ->toBeJson()
            ->json()
            ->toMatchArray($history);

        assertDatabaseHas('histories', $history);

    })->with('userSuperAdminPermission');
   it('Can create history for other user with super admin permission but not add end_work input is not required', function (User $user) {
       $history = [
            'id' => 1,
            'day_id' => 1,
            'user_id' => 1,
            'work_minutes' => 1,
            'start_work' => date("Y-m-d H:i:s")
       ];

       DB::table('histories')->truncate();

       $result = actingAs($user)
           ->postJson(route('histories.store'), $history)
           ->assertOk();

       $content = $result->getContent();

       expect($content)
           ->toBeJson()
           ->json()
           ->toMatchArray($history);

       assertDatabaseHas('histories', $history);

   })->with('userSuperAdminPermission');
   it('Can create history for other user with super admin permission but not add start_work input is not required', function (User $user) {
       $history = [
            'id' => 1,
            'day_id' => 1,
            'user_id' => 1,
            'work_minutes' => 1,
            'end_work' => date("Y-m-d H:i:s")
       ];

       DB::table('histories')->truncate();

       $result = actingAs($user)
           ->postJson(route('histories.store'), $history)
           ->assertOk();

       $content = $result->getContent();

       expect($content)
           ->toBeJson()
           ->json()
           ->toMatchArray($history);

       assertDatabaseHas('histories', $history);

   })->with('userSuperAdminPermission');
   it('Can`t create history for this user without super admin permission', function (User $user) {
       $history = [
            'id' => 1,
            'day_id' => 1,
            'user_id' => ($user->id + 1),
            'work_minutes' => 1,
            'start_work' => date("Y-m-d H:i:s"),
            'end_work' => date("Y-m-d H:i:s"),
       ];

       DB::table('histories')->truncate();

       actingAs($user)
           ->postJson(route('histories.store'), $history)
           ->assertStatus(403);

       assertDatabaseMissing('histories', $history);

   })->with('usersNotHavePermissionSuperAdmin');
   it('Can create history for self user without super admin permission', function (User $user) {
        $history = [
            'id' => 1,
            'day_id' => 1,
            'user_id' => $user->id,
            'work_minutes' => 1,
            'start_work' => date("Y-m-d H:i:s"),
            'end_work' => date("Y-m-d H:i:s"),
        ];

        DB::table('histories')->truncate();

        $result = actingAs($user)
            ->postJson(route('histories.store'), $history)
            ->assertOk();

        $content = $result->getContent();

        expect($content)
            ->toBeJson()
            ->json()
            ->toMatchArray($history);

        assertDatabaseHas('histories', $history);

    })->with('usersNotHavePermissionSuperAdmin');
   it('Test fillable error value for inputs with user super admin permission', function (User $user, string $fillableInput) {
        $input = json_decode($fillableInput);

        $result = actingAs($user)
            ->postJson(route('histories.store'), [
                $input->name => $input->value
            ])
            ->assertStatus(422);

        $content = $result->getContent();

        expect($content)
            ->json()
            ->toHaveKey("errors.{$input->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequestHistory');
});

describe('Test auth user for show routing', function () {

    it('Can view other user with super admin permission', function (User $user) {

        $structure = [
            'id',
            'day_id',
            'user_id',
            'work_minutes',
            'start_work',
            'end_work',
            'redirect',
        ];

        $history = History::factory()->create([
            'user_id' => $user->id + 1
        ]);

        actingAs($user)
            ->getJson(route('histories.show', [
                'history' => $history->id
            ]))
            ->assertOk()
        ->assertJsonStructure($structure);


    })->with('userSuperAdminPermission');

    it('Can view self user history without super admin permission', function (User $user) {

        $structure = [
            'id',
            'day_id',
            'user_id',
            'work_minutes',
            'start_work',
            'end_work',
            'redirect',
        ];

        $history = History::factory()->create([
            'user_id' => $user->id
        ]);

        actingAs($user)
            ->getJson(route('histories.show', [
                'history' => $history->id
            ]))
            ->assertOk()
        ->assertJsonStructure($structure);


    })->with('usersNotHavePermissionSuperAdmin');

    it('Can`t view other user history without super admin permission', function (User $user) {

        $history = History::factory()->create([
            'user_id' => $user->id +1
        ]);

        actingAs($user)
            ->getJson(route('histories.show', [
                'history' => $history->id
            ]))
            ->assertStatus(403);


    })->with('usersNotHavePermissionSuperAdmin');

});

describe('Test auth user for destroy route', function () {
   it('Can destroy history with super admin permission', function (User $user) {

       actingAs($user)
           ->deleteJson(route('histories.destroy', [
               'history' => 1
           ]))->assertStatus(100);

       assertSoftDeleted('histories', [
          'id' => 1
       ]);

   })->with('userSuperAdminPermission');

    it('Can`t destroy self history without super admin permission', function (User $user) {

        $history = History::factory()
            ->create([
                'user_id' => $user->id
            ]);

        actingAs($user)
            ->deleteJson(route('histories.destroy', [
                'history' => $history->id
            ]))->assertStatus(403);

        assertDatabaseHas('histories', [
            'id' => $history->id
        ]);

    })->with('usersNotHavePermissionSuperAdmin');

    it('Can`t destroy oter user history without super admin permission', function (User $user) {

        $history = History::factory()
            ->create([
                'user_id' => $user->id + 1
            ]);

        actingAs($user)
            ->deleteJson(route('histories.destroy', [
                'history' => $history->id
            ]))->assertStatus(403);

        assertDatabaseHas('histories', [
            'id' => $history->id
        ]);

    })->with('usersNotHavePermissionSuperAdmin');
});

describe('Test auth user for update Route', function () {
    it('Can update history for other user with super admin permission', function (User $user) {

        $historyNew = History::factory()->create([
            'user_id' => $user->id +1
        ]);

        $history = [
            'day_id' => 1,
            'work_minutes' => 1,
            'user_id' => $user->id +1,
            'start_work' => date("Y-m-d H:i:s"),
            'end_work' => date("Y-m-d H:i:s"),
        ];

        $result = actingAs($user)
            ->putJson(route('histories.update', [
                'history' => $historyNew->id
            ]), $history)
            ->assertOk();

        $content = $result->getContent();

        expect($content)
            ->toBeJson()
            ->json()
            ->toMatchArray($history);

        assertDatabaseHas('histories', $history);

    })->with('userSuperAdminPermission');

    it('Can`t update history for self user without super admin permission', function (User $user) {

        $historyNew = History::factory()->create([
            'user_id' => $user->id
        ]);

        $history = [
            'day_id' => 1,
            'work_minutes' => 1,
            'user_id' => $user->id,
            'start_work' => date("Y-m-d H:i:s"),
            'end_work' => date("Y-m-d H:i:s"),
        ];

        actingAs($user)
            ->putJson(route('histories.update', [
                'history' => $historyNew->id
            ]), $history)
            ->assertStatus(403);

        assertDatabaseMissing('histories', $history);

    })->with('usersNotHavePermissionSuperAdmin');

    it('Can`t update history for other user history without super admin permission', function (User $user) {

        $historyNew = History::factory()->create([
            'user_id' => $user->id + 1
        ]);

        $history = [
            'day_id' => 1,
            'work_minutes' => 1,
            'user_id' => $user->id +1,
            'start_work' => date("Y-m-d H:i:s"),
            'end_work' => date("Y-m-d H:i:s"),
        ];

        actingAs($user)
            ->putJson(route('histories.update', [
                'history' => $historyNew->id
            ]), $history)
            ->assertStatus(403);

        assertDatabaseMissing('histories', $history);

    })->with('usersNotHavePermissionSuperAdmin');

    it('Test fillable error value for inputs with user super admin permission', function (User $user, string $fillableInput) {
        $input = json_decode($fillableInput);

        $result = actingAs($user)
            ->putJson(route('histories.update', [
                'history' => 1
            ]), [
                $input->name => $input->value
            ])
            ->assertStatus(422);

        $content = $result->getContent();

        expect($content)
            ->json()
            ->toHaveKey("errors.{$input->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequestHistory');
});
