<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Appointment\AppointmentInterface;
use App\Services\Appointment\AppointmentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AppointmentInterface::class, AppointmentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
