<?php

namespace App\Interfaces\Appointment;

// use Carbon\Carbon;

interface AppointmentInterface
{
    public function generateSchedule(
        string $startHour,
        string $endHour,
        ?string $lunchStartTime = null,
        ?string $lunchEndTime = null,
        ?string $saturdayEndHour = null,
        int $consultationDuration = 30,
        int $intervalDuration = 5
    ): void;
}
