<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('ChatKit', function() {
            // Note: Legacy ChatKit package might need replacement for PHP 8.3/Laravel 11
            if (class_exists('\Chatkit\Chatkit')) {
                return new \Chatkit\Chatkit([
                    'instance_locator' => config('services.chatkit.locator'),
                    'key' => config('services.chatkit.secret'),
                ]);
            }
            return null;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }
}
