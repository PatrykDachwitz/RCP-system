<?php
declare(strict_types=1);
use App\Models\User;

dataset('userNotActive', [
    fn() => User::factory()->create([
        'active' => 0
    ]),
]);
