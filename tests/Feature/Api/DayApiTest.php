<?php
declare(strict_types=1);

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

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

describe('Test Show routing', function () {

    it('ceck index ', function () {


        $user = \App\Models\User::factory()->create();

        actingAs($user)->getJson(route('days.index'))
            ->assertOk();
});


});
