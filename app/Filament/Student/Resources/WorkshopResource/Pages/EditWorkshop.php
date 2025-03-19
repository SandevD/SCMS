<?php

namespace App\Filament\Student\Resources\WorkshopResource\Pages;

use App\Filament\Student\Resources\WorkshopResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkshop extends EditRecord
{
    protected static string $resource = WorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
