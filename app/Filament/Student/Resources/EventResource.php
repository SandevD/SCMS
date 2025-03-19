<?php

namespace App\Filament\Student\Resources;

use App\Enum\ReservationTypes;
use App\Filament\Student\Resources\EventResource\Pages;
use App\Filament\Student\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\Reservation;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';

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
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name'),
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Reserve')
                    ->modalHeading('Reservation Request')
                    ->requiresConfirmation()
                    ->form([
                        TextInput::make('event')
                            ->label('Event')
                            ->default(fn($record) => $record->name ?? '')
                            ->disabled()
                            ->required(),
                        TextInput::make('full_name')
                            ->label('Reserve for Student')
                            ->default(auth()->user()->name)
                            ->disabled()
                            ->required(),
                    ])
                    ->modalDescription('By clicking confirm a reservation request for this event will be placed under your name.')
                    ->action(function ($record) {
                        $reservation = new Reservation();
                        $reservation->model = ReservationTypes::EVENT->getName();
                        $reservation->model_id = $record->id;
                        $reservation->start = $record->start;
                        $reservation->end = $record->end;
                        $reservation->save();
                    })
            ])
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
