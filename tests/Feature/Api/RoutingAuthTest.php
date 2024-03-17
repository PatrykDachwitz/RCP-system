<?php
declare(strict_types=1);

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

describe('Test not auth user', function () {

    it('Can`t view get route', function (string $url) {
        getJson($url)
            ->assertStatus(401);
    })->with('getRoutes');

    it('Can`t view put route', function (string $url) {
        putJson($url)
            ->assertStatus(401);
    })->with('putRoutes');

    it('Can`t view delete route', function (string $url) {
        deleteJson($url)
            ->assertStatus(401);
    })->with('deleteRoutes');

    it('Can`t view post route', function (string $url) {
        postJson($url)
            ->assertStatus(401);
    })->with('postRoutes');

});

describe('Test not active user', function () {

    it('Can`t view get route', function (User $user, string $url) {
        actingAs($user)
            ->getJson($url)
            ->assertStatus(403);
    })->with('userNotActive', 'getRoutes');

    it('Can`t view put route', function (User $user, string $url) {
        actingAs($user)
            ->putJson($url)
            ->assertStatus(403);
    })->with('userNotActive', 'putRoutes');

    it('Can`t view delete route', function (User $user, string $url) {
        actingAs($user)
            ->deleteJson($url)
            ->assertStatus(403);
    })->with('userNotActive', 'deleteRoutes');

    it('Can`t view post route', function (User $user, string $url) {
        actingAs($user)
            ->postJson($url)
            ->assertStatus(403);
    })->with('userNotActive', 'postRoutes');

});

