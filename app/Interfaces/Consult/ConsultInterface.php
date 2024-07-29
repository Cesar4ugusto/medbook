<?php

namespace App\Interfaces\Consult;

interface ConsultInterface
{
    public function saveSchedule(
        int $appointmentId,
        string $patientName,
        string $patientEmail
    ): void;
}
