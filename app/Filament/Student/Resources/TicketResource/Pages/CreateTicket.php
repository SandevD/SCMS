<?php

namespace App\Filament\Student\Resources\TicketResource\Pages;

use App\Filament\Student\Resources\TicketResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;
}
