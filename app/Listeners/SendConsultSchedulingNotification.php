<?php

namespace App\Listeners;

use App\Events\ConsultScheduling;
use App\Notifications\ConsultSchedulingNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendConsultSchedulingNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ConsultScheduling $event): void
    {
        $event->consult->notify(new ConsultSchedulingNotification());
    }
}
