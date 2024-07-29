<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Consult\ConsultController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/appointment', [AppointmentController::class, 'store']);
Route::post('/consulting-scheduling', [ConsultController::class, 'store']);
