<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\AppointmentRequest;
use App\Interfaces\Appointment\AppointmentInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    protected $appointmentService;

    public function __construct(AppointmentInterface $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function store(AppointmentRequest $request): JsonResponse
    {
        $this->appointmentService->generateSchedule(
            $request->start_hour,
            $request->end_hour,
            $request->lunch_start_time,
            $request->lunch_end_time,
            $request->saturday_end_hour,
            $request->consultation_duration,
            $request->interval_duration
        );

        return response()->json(['message' => 'Schedule generated successfully']);
    }
}
