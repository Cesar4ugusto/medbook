<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsultingSchedulingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_save_consulting_scheduling(): void
    {
        $response = $this->post('/consulting-scheduling', [
            'appointment_id' => 14,
            'patient_name' => 'John Doe',
            'patient_email' => 'jhondoe@email.com',
        ]);

        $response->assertStatus(200);
    }
}
