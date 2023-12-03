<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Notification;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
 public function boot()
{
    View::composer('*', function ($view) {
        $notifications = Notification::all();
        $view->with('notifications', $notifications);
    });
}
}
