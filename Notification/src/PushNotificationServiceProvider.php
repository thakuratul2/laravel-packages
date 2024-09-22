<?php 

namespace Notification;

use Illuminate\Support\ServiceProvider;

class PushNotificationServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->singleton(PushNotification::class, function(){
            return new PushNotification();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}
