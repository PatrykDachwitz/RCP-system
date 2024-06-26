<?php
declare(strict_types=1);
namespace App\Providers;

use App\Repository\TypeHolidayRepository as TypeHolidayInterface;
use App\Repository\Eloquent\TypeHolidayRepository;
use App\Repository\DayRepository as DayRepositoryInterface;
use App\Repository\Eloquent\DayRepository;
use App\Repository\HistoryRepository as HistoryRepositoryInterface;
use App\Repository\Eloquent\HistoryRepository;
use App\Repository\DepartmentRepository as DepartmentRepositoryInterface;
use App\Repository\Eloquent\DepartmentRepository;
use App\Repository\HolidayRepository as HolidayRepositoryInterface;
use App\Repository\Eloquent\HolidayRepository;
use App\Repository\PositionRepository as PositionRepositoryInterface;
use App\Repository\Eloquent\PositionRepository;
use App\Repository\PresenceRepository as PresenceRepositoryInterface;
use App\Repository\Eloquent\PresenceRepository;
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
        $this->app->singleton(
            PositionRepositoryInterface::class,
            PositionRepository::class,
        );
        $this->app->singleton(
            PresenceRepositoryInterface::class,
            PresenceRepository::class,
        );
        $this->app->singleton(
            TypeHolidayInterface::class,
            TypeHolidayRepository::class,
        );
    }
}
