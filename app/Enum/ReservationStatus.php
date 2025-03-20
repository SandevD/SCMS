<?php

namespace App\Enum;

enum ReservationStatus:int
{
    case COMPLETE = 1;
    case PENDING = 2;
    case REJECTED = 3;
    case CANCELLED = 0;

    public function getName(): int
    {
        return $this->value;
    }
}
