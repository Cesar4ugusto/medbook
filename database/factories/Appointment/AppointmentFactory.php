<?php

namespace Database\Factories\Appointment;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => now()->addDay()->toDateString(),
            'start_time' => now()->addDay()->toTimeString(),
            'end_time' => now()->addDay()->addHour()->toTimeString(),
        ];
    }
}
