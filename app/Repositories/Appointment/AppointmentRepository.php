<?php

namespace App\Repositories\Appointment;

use App\Models\Appointment\Appointment;
use App\Repositories\BaseRepository;

class AppointmentRepository extends BaseRepository
{
    public function __construct(Appointment $appointment)
    {
        parent::__construct($appointment);
    }
}
