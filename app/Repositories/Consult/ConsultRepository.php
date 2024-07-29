<?php

namespace App\Repositories\Consult;

use App\Models\Consult\Consult;
use App\Repositories\BaseRepository;

class ConsultRepository extends BaseRepository
{
    public function __construct(Consult $consult)
    {
        parent::__construct($consult);
    }
}
