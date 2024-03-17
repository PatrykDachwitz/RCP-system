<?php
declare(strict_types=1);
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertSoftDeleted;
use function Pest\Laravel\deleteJson;

beforeEach(function () {
   Department::factory()
       ->count(60)
       ->create();
});



describe('Test Auth user for destroy routing', function () {

    it ('Test count delete department for user with super admin permission', function (User $user) {

        actingAs($user)
            ->deleteJson(route('departments.destroy', [
            'department' => 1
        ]))
            ->assertStatus(100);

        assertSoftDeleted('departments', [
            'id' => 1
        ]);

    })->with('userSuperAdminPermission');

    it ('Test count delete department for user with not have super admin permission', function (User $user) {

        actingAs($user)
        ->deleteJson(route('departments.destroy', [
            'department' => 1
        ]))
            ->assertStatus(403);

    })->with('usersNotHavePermissionSuperAdmin');
});

describe('Test Auth user for create routing', function () {

    it ('Can create department with super admin permission', function (User $user) {
        $department = [
            'name' => "testName",
            'active' => 1,
            'id' => 1,
            'redirect' => route('departments.show', [
                'department' => 1
            ]),
        ];

        DB::table('departments')->truncate();

        $result = actingAs($user)
            ->postJson(route('departments.store'), $department)
            ->assertOk();

        $content = $result->getContent();
        expect($content)
            ->toBeJson()
            ->json()
            ->toMatchArray($department);

        unset($department['redirect']);

        assertDatabaseHas('departments', $department);
    })->with('userSuperAdminPermission');

    it ('Can`t create department without super admin permission', function (User $user) {
        $department = [
            'name' => "testName",
            'active' => 1,
            'id' => 1,
            'redirect' => route('departments.show', [
                'department' => 1
            ]),
        ];

        actingAs($user)
            ->postJson(route('departments.store'), $department)
            ->assertStatus(403);

    })->with('usersNotHavePermissionSuperAdmin');

    it ('Can`t valid inputs for department create api route', function (User $user, string $errorInput) {

        $input = json_decode($errorInput);

        $result = actingAs($user)
            ->postJson(route('departments.store'), [
                $input->name => $input->value
            ])
            ->assertStatus(422);

        $content = $result->getContent();

        expect($content)
            ->json()
            ->toHaveKey("errors.{$input->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequestDepartment');
});

describe('Test Auth user for update routing', function () {

    it ('Can update department with super admin permission', function (User $user) {
        $department = [
            'name' => "testName",
            'active' => 1,
            'id' => 1,
            'redirect' => route('departments.show', [
                'department' => 1
            ]),
        ];

        $result = actingAs($user)
            ->putJson(route('departments.update', [
                'department' => 1
            ]), $department)
            ->assertOk();

        $content = $result->getContent();

        expect($content)
            ->toBeJson()
            ->json()
            ->toMatchArray($department);

        unset($department['redirect']);

        assertDatabaseHas('departments', $department);
    })->with('userSuperAdminPermission');

    it ('Can`t update department without super admin permission', function (User $user) {
        $department = [
            'name' => "testName",
            'active' => 1,
            'id' => 1,
            'redirect' => route('departments.show', [
                'department' => 1
            ]),
        ];

        actingAs($user)
            ->putJson(route('departments.update', [
                'department' => 1
            ]), $department)
            ->assertStatus(403);

    })->with('usersNotHavePermissionSuperAdmin');

    it ('Can`t valid inputs for department update api route', function (User $user, string $errorInput) {

        $input = json_decode($errorInput);

        $result = actingAs($user)
            ->putJson(route('departments.update', [
                'department' => 1
            ]), [
                $input->name => $input->value
            ])
            ->assertStatus(422);

        $content = $result->getContent();

        expect($content)
            ->json()
            ->toHaveKey("errors.{$input->name}");

    })->with('userSuperAdminPermission', 'failedInputsRequestDepartment');
});

describe('Test Auth user for show routing', function () {

    it ('Can show department with all permission', function (User $user) {
        $department = [
            'name',
            'active',
            'id',
            'redirect',
        ];

        actingAs($user)
            ->getJson(route('departments.show', [
                'department' => 1
            ]))
            ->assertOk()
        ->assertJsonStructure($department);

    })->with('usersActive');

});

describe('Test Auth user for index routing', function () {

    it ('Can index department with all permission', function (User $user) {
        $department = [
            'name',
            'active',
            'id',
            'redirect',
        ];

        $result = actingAs($user)
            ->getJson(route('departments.index'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    "*" => $department
                ]
            ])
        ->json('data');


        expect($result)
            ->toHaveCount(20);

    })->with('usersActive');

});
