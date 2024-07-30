<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ConsultSchedulingTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_save_data(): void
    {
        $consult = \App\Models\Consult\Consult::factory()->create();

        $this->assertDatabaseHas('consults', [
            'appointment_id' => $consult->appointment_id,
            'patient_name' => $consult->patient_name,
            'patient_email' => $consult->patient_email,
        ]);
    }

    /**
     * A basic unit test example.
     */
    public function test_send_notification_consult_scheduling(): void
    {
        $consult = \App\Models\Consult\Consult::factory()->create();

        Notification::fake();

        $consult->notify(new \App\Notifications\ConsultSchedulingNotification());

        Notification::assertSentTo(
            $consult,
            \App\Notifications\ConsultSchedulingNotification::class
        );
    }
}
