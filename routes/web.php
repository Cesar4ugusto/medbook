<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Appointment\AppointmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/appointment', [AppointmentController::class, 'store']);
