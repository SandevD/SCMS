<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BatchResource\Pages;
use App\Filament\Resources\BatchResource\RelationManagers;
use App\Filament\Resources\BatchResource\RelationManagers\UsersRelationManager;
use App\Helpers\CoreHelper;
use App\Models\Batch;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BatchResource extends Resource
{
    protected static ?string $model = Batch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Batch';

    protected static ?string $navigationGroup = 'Resources';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        $yearOptions = CoreHelper::getYears(10);
        return $form
            ->schema([
                Section::make('Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name of Batch')
                            ->required(),
                        Select::make('from_year')
                            ->label('Year')
                            ->options($yearOptions),
                        Select::make('to_year')
                            ->label('Year')
                            ->options($yearOptions),
                    ])->columns(2),
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
                    ->label('Name of Batch')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('from_year')
                    ->label('From Year')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('to_year')
                    ->label('To Year')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('students')
                    ->label('Students')
                    ->color('success')
                    ->icon('heroicon-o-users')
                    ->url(fn($record): string => static::getUrl('students', ['record' => $record])),
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
            UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBatches::route('/'),
            'create' => Pages\CreateBatch::route('/create'),
            'edit' => Pages\EditBatch::route('/{record}/edit'),
            'students' => Pages\ManageBatchStudents::route('/{record}/students'),
        ];
    }
}
