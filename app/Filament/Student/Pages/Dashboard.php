<?php

namespace App\Filament\Student\Pages;

use App\Filament\Widgets\StudentCalendarWidget;
use Filament\Pages\Dashboard\Concerns\HasFiltersAction;
use Filament\Widgets\AccountWidget;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersAction;

    protected static ?string $title = 'Student Dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            StudentCalendarWidget::class,
        ];
    }
}
