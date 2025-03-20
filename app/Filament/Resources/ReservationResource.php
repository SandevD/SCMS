<?php

namespace App\Filament\Resources;

use App\Enum\ReservationStatus;
use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Reservation;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Reservation';

    protected static ?string $navigationGroup = 'Scheduling';

    protected static ?int $navigationSort = 3;

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
            ->actions([
                Tables\Actions\Action::make('Confirm')
                    ->modalHeading('Confirm Reservation Request')
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-m-check-circle')
                    ->form([
                        TextInput::make('name')
                            ->label('Name')
                            ->default(function ($record) {
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
                            ->disabled()
                            ->required(),
                        TextInput::make('full_name')
                            ->label('Reserve for Student')
                            ->default(fn($record) => $record->user?->name ?? '')
                            ->disabled()
                            ->required(),
                    ])
                    ->modalDescription('By clicking confirm the request will be approved.')
                    ->action(function ($record) {
                        try {
                            $record->status = ReservationStatus::COMPLETE;
                            $record->save();

                            Notification::make()
                                ->title('Request Approved')
                                ->success()
                                ->body('The students reservation request has been approved.')
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Request Approval Failed')
                                ->danger()
                                ->body($e->getMessage())
                                ->send();
                        }
                    }),
                Tables\Actions\Action::make('Reject')
                    ->modalHeading('Reject Reservation Request')
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-m-no-symbol')
                    ->form([
                        TextInput::make('name')
                            ->label('Name')
                            ->default(function ($record) {
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
                            ->disabled()
                            ->required(),
                        TextInput::make('full_name')
                            ->label('Reserve for Student')
                            ->default(fn($record) => $record->user?->name ?? '')
                            ->disabled()
                            ->required(),
                    ])
                    ->modalDescription('By clicking confirm the request will be rejected.')
                    ->action(function ($record) {
                        try {
                            $record->status = ReservationStatus::REJECTED;
                            $record->save();

                            Notification::make()
                                ->title('Request Rejected Successfully')
                                ->success()
                                ->body('The students reservation request has been rejected.')
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Request Rejection Failed')
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
            'index' => Pages\ListReservations::route('/'),
        ];
    }
}
