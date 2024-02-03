<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        View::composer(['*'], function ($view) {
            $notifications = Notification::where('created_at', '>=', now()->subDays(30))->orderByDesc('id')->get();
            $view->with([
                'notifications' => $notifications,
            ]);
        });

    }
}
