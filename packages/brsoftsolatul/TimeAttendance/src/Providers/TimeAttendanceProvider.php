<?php

namespace brsoftsolatul\TimeAttendance\Providers;

use Illuminate\Support\ServiceProvider;
use brsoftsolatul\TimeAttendance\Providers\RouteServiceProvider;

class TimeAttendanceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $moduleName = 'TimeAttendance';
    protected $moduleNameLower = 'timeattedance';
    public function register(): void
    {
        //
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'TimeAttendance');
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
    }
}
