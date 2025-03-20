<?php

namespace App\Filament\Student\Resources;

use App\Enum\ReservationStatus;
use App\Filament\Student\Resources\ReservationResource\Pages;
use App\Filament\Student\Resources\ReservationResource\RelationManagers;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Reservation;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('model')
                    ->searchable()
                    ->sortable()
                    ->label('Type'),
                TextColumn::make('model_id')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($record) {
                        if ($record->model == 'EVENT') {
                            $event = Event::find($record->model_id);
                            return $event->name;
                        }
                        if ($record->model == 'WORKSHOP') {
                            $workshop = Workshop::find($record->model_id);
                            return $workshop->name;
                        }
                        if ($record->model == 'FACILITY') {
                            $facility = Facility::find($record->model_id);
                            return $facility->name;
                        }
                        return $record->model_id;
                    })
                    ->label('Type'),
                TextColumn::make('start')
                    ->searchable()
                    ->sortable()
                    ->dateTime()
                    ->label('Start'),
                TextColumn::make('end')
                    ->searchable()
                    ->sortable()
                    ->dateTime()
                    ->label('End'),
                BadgeColumn::make('status')
                    ->formatStateUsing(fn(int $state): string => match ($state) {
                        ReservationStatus::COMPLETE->value => 'Complete',
                        ReservationStatus::PENDING->value => 'Pending',
                        ReservationStatus::REJECTED->value => 'Rejected',
                        ReservationStatus::CANCELLED->value => 'Cancelled',
                    })
                    ->color(fn(int $state): string => match ($state) {
                        ReservationStatus::COMPLETE->value => 'success', // Green
                        ReservationStatus::PENDING->value => 'warning', // Yellow
                        ReservationStatus::REJECTED->value => 'danger', // Red
                        ReservationStatus::CANCELLED->value => 'gray', // Gray
                    })
            ])
            ->filters([
                //
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
        ];
    }
}
