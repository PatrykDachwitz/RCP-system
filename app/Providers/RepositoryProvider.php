<?php
declare(strict_types=1);
namespace App\Providers;

use App\Repository\DayRepository as DayRepositoryInterface;
use App\Repository\Eloquent\DayRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(
            DayRepositoryInterface::class,
            DayRepository::class,
        );
    }
}
