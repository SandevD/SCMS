<?php

namespace App\Filament\Student\Resources\AnnouncementResource\Pages;

use App\Filament\Student\Resources\AnnouncementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAnnouncement extends CreateRecord
{
    protected static string $resource = AnnouncementResource::class;
}
