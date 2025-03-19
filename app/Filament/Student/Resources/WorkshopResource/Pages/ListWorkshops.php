<?php

namespace App\Filament\Student\Resources\WorkshopResource\Pages;

use App\Filament\Student\Resources\WorkshopResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkshops extends ListRecords
{
    protected static string $resource = WorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
