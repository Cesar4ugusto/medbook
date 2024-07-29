<?php

namespace App\Services\Appointment;

use App\Interfaces\Appointment\AppointmentInterface;
use App\Repositories\Appointment\AppointmentRepository;
use Carbon\Carbon;

class AppointmentService implements AppointmentInterface
{
    protected $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function generateSchedule(
        string $startHour,
        string $endHour,
        ?string $lunchStartTime = null,
        ?string $lunchEndTime = null,
        ?string $saturdayEndHour = null,
        int $consultationDuration = 30,
        int $intervalDuration = 5
    ): void {
        $specialDates = ['01-01', '04-21', '05-01', '09-07', '10-12', '11-02', '12-25'];

        for ($day = 1; $day <= now()->daysInMonth(); $day++) {
            $date = Carbon::createFromDate(now()->year, now()->month, $day);

            if (in_array($date->format('m-d'), $specialDates)) {
                continue;
            }

            if ($date->isWeekday() || $date->isSaturday()) {

                $startTime = $date->copy()->setTimeFrom(Carbon::parse($startHour));
                $endTime = $date->copy()->setTimeFrom(
                    $date->isFriday()
                        ? Carbon::parse($endHour)
                        : (
                            $date->isSaturday()
                            ? (
                                $saturdayEndHour
                                ? Carbon::parse($saturdayEndHour)
                                : Carbon::parse('13:00')
                            )
                            : Carbon::parse($endHour)
                        )
                );

                while ($startTime < $endTime) {
                    if ($lunchStartTime && $lunchEndTime && !$date->isSaturday()) {

                        $lunchStart = $date->copy()->setTimeFrom(Carbon::parse($lunchStartTime));
                        $lunchEnd = $date->copy()->setTimeFrom(Carbon::parse($lunchEndTime));

                        if ($startTime->between($lunchStart, $lunchEnd)) {
                            $difference = $startTime->diffInMinutes($lunchStart);
                            $startTime = $lunchEnd->addMinutes(max(0, $difference))->addMinutes($intervalDuration);
                            continue;
                        }
                    }

                    $this->appointmentRepository->save([
                        'date' => $date->toDateString(),
                        'start_time' => $startTime->toTimeString(),
                        'end_time' => $startTime->addMinutes($consultationDuration)->toTimeString(),
                    ]);

                    $startTime->addMinutes($intervalDuration);

                }
            }
        }
    }
}
