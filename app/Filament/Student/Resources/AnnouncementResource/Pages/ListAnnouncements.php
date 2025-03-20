<?php

namespace App\Filament\Student\Resources\AnnouncementResource\Pages;

use App\Filament\Student\Resources\AnnouncementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnnouncements extends ListRecords
{
    protected static string $resource = AnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
