<?php

namespace App\Enum;

enum ReservationTypes:String
{
    case WORKSHOP = 'WORKSHOP';
    case EVENT = 'EVENT';
    case CLASSROOM = 'CLASSROOM';
    case FACILITY = 'FACILITY';

    public function getName(): string
    {
        return $this->value;
    }
}
