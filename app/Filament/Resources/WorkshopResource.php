<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopResource\Pages;
use App\Filament\Resources\WorkshopResource\RelationManagers;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkshopResource extends Resource
{
    protected static ?string $model = Workshop::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Workshop';

    protected static ?string $navigationGroup = 'Scheduling';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        DatePicker::make('start')
                            ->label('Start')
                            ->format('Y-m-d H:i:s')
                            ->required(),
                        DatePicker::make('end')
                            ->label('End')
                            ->format('Y-m-d H:i:s')
                            ->required(),
                    ])->columns(2),
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'create' => Pages\CreateWorkshop::route('/create'),
            'edit' => Pages\EditWorkshop::route('/{record}/edit'),
        ];
    }
}
