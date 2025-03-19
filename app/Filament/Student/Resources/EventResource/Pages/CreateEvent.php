<?php

namespace App\Filament\Student\Resources\EventResource\Pages;

use App\Filament\Student\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
}
