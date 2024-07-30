<?php

namespace Database\Factories\Consult;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consult\Consult>
 */
class ConsultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appointment_id' => \App\Models\Appointment\Appointment::factory(),
            'patient_name' => fake()->name(),
            'patient_email' => fake()->unique()->safeEmail(),
        ];
    }
}
