<?php
declare(strict_types=1);
use App\Models\User;

dataset('userNotActive', [
    fn() => User::factory()->create([
        'active' => 0
    ]),
]);

dataset('usersActive', [
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 0,
        'position_id' => 1,
    ]),
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 0,
        'position_id' => 2,
    ]),
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 0,
        'position_id' => 3,
    ]),
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 1,
        'position_id' => 1,
    ]),
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 1,
        'position_id' => 2,
    ]),
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 1,
        'position_id' => 3,
    ]),
]);

dataset('userSuperAdminPermission', [
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 1,
        'position_id' => 1,
    ])
]);

dataset('usersNotHavePermissionSuperAdmin', [
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 0,
        'position_id' => 1,
    ]),
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 0,
        'position_id' => 2,
    ]),
    fn() => User::factory()->create([
        'active' => 1,
        'super_admin' => 0,
        'position_id' => 3,
    ]),
]);
