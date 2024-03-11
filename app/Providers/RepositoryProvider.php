<?php
declare(strict_types=1);
namespace App\Providers;

use App\Repository\DayRepository as DayRepositoryInterface;
use App\Repository\Eloquent\DayRepository;
use App\Repository\HistoryRepository as HistoryRepositoryInterface;
use App\Repository\Eloquent\HistoryRepository;
use App\Repository\DepartmentRepository as DepartmentRepositoryInterface;
use App\Repository\Eloquent\DepartmentRepository;
use App\Repository\HolidayRepository as HolidayRepositoryInterface;
use App\Repository\Eloquent\HolidayRepository;
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
        $this->app->singleton(
            DepartmentRepositoryInterface::class,
            DepartmentRepository::class,
        );
        $this->app->singleton(
            HistoryRepositoryInterface::class,
            HistoryRepository::class,
        );
        $this->app->singleton(
            HolidayRepositoryInterface::class,
            HolidayRepository::class,
        );
    }
}
