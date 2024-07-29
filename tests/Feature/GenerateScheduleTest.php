<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenerateScheduleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_generate_schedule(): void
    {
        $response = $this->post('/appointment', [
            'start_hour' => '08:00',
            'end_hour' => '17:00',
            'lunch_start_time' => '13:00',
            'lunch_end_time' => '14:00',
            'saturday_end_hour' => '12:00',
            'consultation_duration' => 30,
            'interval_duration' => 15
        ]);

        $response->assertStatus(200);
    }
}
