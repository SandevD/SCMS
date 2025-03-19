<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CalendarWidget;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\StudentsPerMonth;
use Filament\Pages\Dashboard\Concerns\HasFiltersAction;
use Filament\Widgets\AccountWidget;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersAction;

    protected static ?string $title = 'Main Dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Dashboards';

    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            CalendarWidget::class,
        ];
    }
}
