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
        $this->app->bind(
            \App\Services\TaskServiceInterface::class,
            \App\Services\TaskService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // \App\Models\Task::observe(\App\Observers\EmailObserver::class);
        //
    }
}
