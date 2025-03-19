<?php

namespace App\Filament\Resources\SuperAdminResource\Pages;

use App\Filament\Resources\SuperAdminResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuperAdmin extends EditRecord
{
    protected static string $resource = SuperAdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
