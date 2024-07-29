<?php

namespace App\Models\Consult;

use App\Events\ConsultScheduling;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => ConsultScheduling::class,
    ];
}
