<?php

namespace brsoftsolatul\TimeAttendance\Providers;

use Carbon\Laravel\ServiceProvider;

class TimeAttendanceServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__.'/../Routes.php');

        $this->publishes([
            __DIR__.'/../config/TimeAttendance.php' => config_path('TimeAttendance.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/TimeAttendance.php', 'TimeAttendance'
        );
    }
}
