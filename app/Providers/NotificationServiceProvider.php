<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('notification.forUser', 'App\Library\Services\NotificationForUser');
        $this->app->bind('notification.forPost', 'App\Library\Services\NotificationForPost');
        $this->app->bind('notification.forOrder', 'App\Library\Services\NotificationForOrder');
        // $this->app->bind('App\Library\Services\Contracts\NotificationServiceInterface',
        //     function ($app) {
        //         return new \App\Library\Services\NotificationForUser();
        // });
    }
}
