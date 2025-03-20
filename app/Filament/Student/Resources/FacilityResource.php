<?php

namespace App\Filament\Student\Resources;

use App\Enum\ReservationTypes;
use App\Filament\Student\Resources\FacilityResource\Pages;
use App\Filament\Student\Resources\FacilityResource\RelationManagers;
use App\Models\Facility;
use App\Models\Reservation;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

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
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Name of Facility')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Reserve')
                    ->modalHeading('Reservation Request')
                    ->requiresConfirmation()
                    ->form([
                        TextInput::make('facility')
                            ->label('Facility')
                            ->default(fn($record) => $record->name ?? '')
                            ->disabled()
                            ->required(),
                        TextInput::make('full_name')
                            ->label('Reserve for Student')
                            ->default(auth()->user()->name)
                            ->disabled()
                            ->required(),
                            DateTimePicker::make('start')
                            ->label('Start Time')
                            ->required()
                            ->default(now()),

                        DateTimePicker::make('end')
                            ->label('End Time')
                            ->required()
                            ->default(now()),
                    ])
                    ->modalDescription('By clicking confirm a reservation request for this facility will be placed under your name.')
                    ->action(function ($record, array $data,) {
                        try {
                            $userId = auth()->id();
                            $requestedStart = Carbon::parse($data['start']);
                            $requestedEnd = Carbon::parse($data['end']);
                            $existingReservation = Reservation::where('model', 'FACILITY')
                                ->where('model_id', $record->id)
                                ->where('status', 1)
                                ->where(function ($query) use ($requestedStart, $requestedEnd) {
                                    $query->whereBetween('start', [$requestedStart, $requestedEnd])
                                        ->orWhereBetween('end', [$requestedStart, $requestedEnd])
                                        ->orWhere(function ($query) use ($requestedStart, $requestedEnd) {
                                            $query->where('start', '<=', $requestedStart)
                                                ->where('end', '>=', $requestedEnd);
                                        });
                                })
                                ->exists();
                            if ($existingReservation) {
                                throw new \Exception('A reservation by you or someone else already exists for this facility during the requested time.');
                            }
                            Reservation::create([
                                'model' => ReservationTypes::FACILITY->getName(),
                                'model_id' => $record->id,
                                'user_id' => $userId,
                                'start' => $requestedStart,
                                'end' => $requestedEnd,
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
            'index' => Pages\ListFacilities::route('/'),
            'create' => Pages\CreateFacility::route('/create'),
            'edit' => Pages\EditFacility::route('/{record}/edit'),
        ];
    }
}
