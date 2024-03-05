<?php
declare(strict_types=1);
namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('ActiveUser', function (User $user) {
            if ($user->active === true) return true;
            else return false;
        });

        Gate::define('SuperAdminPermissionUser', function (User $user) {
            if ($user->super_admin === true) return true;
            else return false;
        });
        Gate::define('isThisUser', function (User $user, int $idUser) {
            if ($user->id === $idUser) return true;
            else return false;
        });

        Gate::before(function (User $user, string $ability) {
            if ($user->super_admin === true) return true;
            else return null;
        });
    }
}
