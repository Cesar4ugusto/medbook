<?php

namespace App\Models\Consult;

use App\Events\ConsultScheduling;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class Consult extends Model
{
    use HasFactory, Notifiable;

    protected $dispatchesEvents = [
        'created' => ConsultScheduling::class,
    ];

    /**
     * Route notifications for the mail channel.
     * @return  array<string, string>|string
     */
    public function routeNotificationForMail(Notification $notification): array|string
    {
        return $this->patient_email;
    }
}
