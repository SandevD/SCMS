<?php

namespace App\Enum;

enum AnnouncementTypes:String
{
    case General = 'General';
    case Academic = 'Academic';
    case Event = 'Event';
    case Emergency = 'Emergency';
    case Miscellaneous = 'Miscellaneous';

    public function getName(): string
    {
        return $this->value;
    }
}
