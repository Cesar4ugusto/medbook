<?php

namespace App\Services\Consult;

use App\Interfaces\Consult\ConsultInterface;
use App\Repositories\Consult\ConsultRepository;

class ConsultService implements ConsultInterface
{
    protected $consultRepository;

    public function __construct(ConsultRepository $consultRepository)
    {
        $this->consultRepository = $consultRepository;
    }

    public function saveSchedule(int $appointmentId, string $patientName, string $patientEmail): void
    {
        $this->consultRepository->save([
            'appointment_id' => $appointmentId,
            'patient_name' => $patientName,
            'patient_email' => $patientEmail,
        ]);
    }
}
