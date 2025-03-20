<?php

namespace App\Filament\Student\Resources;

use App\Enum\ReservationTypes;
use App\Filament\Student\Resources\WorkshopResource\Pages;
use App\Filament\Student\Resources\WorkshopResource\RelationManagers;
use App\Models\Reservation;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkshopResource extends Resource
{
    protected static ?string $model = Workshop::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

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
                        TextInput::make('workshop')
                            ->label('Workshop')
                            ->default(fn($record) => $record->name ?? '')
                            ->disabled()
                            ->required(),
                        TextInput::make('full_name')
                            ->label('Reserve for Student')
                            ->default(auth()->user()->name)
                            ->disabled()
                            ->required(),
                    ])
                    ->modalDescription('By clicking confirm a reservation request for this workshop will be placed under your name.')
                    ->action(function ($record) {
                        try {
                            $userId = auth()->id();
                            $existingReservation = Reservation::where('model', 'WORKSHOP')
                                ->where('model_id', $record->id)
                                ->where('user_id', $userId)
                                ->whereIn('status', [1, 2])
                                ->exists();
                            if ($existingReservation) {
                                throw new \Exception('You have already reserved a spot for this workshop please check the status of that before proceeding.');
                            }
                            Reservation::create([
                                'model' => ReservationTypes::WORKSHOP->getName(),
                                'model_id' => $record->id,
                                'user_id' => $userId,
                                'start' => $record->start,
                                'end' => $record->end,
                            ]);

                            Notification::make()
                                ->title('Reservation Successful')
                                ->success()
                                ->body('Your reservation has been placed successfully.')
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Reservation Failed')
                                ->danger()
                                ->body($e->getMessage())
                                ->send();
                        }
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
            'index' => Pages\ListWorkshops::route('/'),
        ];
    }
}
