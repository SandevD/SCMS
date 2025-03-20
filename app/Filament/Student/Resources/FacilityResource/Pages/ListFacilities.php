<?php

namespace App\Filament\Student\Resources\FacilityResource\Pages;

use App\Filament\Student\Resources\FacilityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFacilities extends ListRecords
{
    protected static string $resource = FacilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
