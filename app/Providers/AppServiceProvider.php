<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Appointment\AppointmentInterface;
use App\Interfaces\Consult\ConsultInterface;
use App\Services\Appointment\AppointmentService;
use App\Services\Consult\ConsultService;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        AppointmentInterface::class => AppointmentService::class,
        ConsultInterface::class => ConsultService::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
