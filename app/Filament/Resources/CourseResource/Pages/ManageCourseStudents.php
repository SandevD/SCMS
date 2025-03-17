<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManageCourseStudents extends ManageRelatedRecords
{
    protected static string $resource = CourseResource::class;

    protected static string $relationship = 'users';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string
    {
        return 'Users';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('admission_no')
                    ->searchable()
                    ->label('Admission No'),
                TextColumn::make('name')
                    ->searchable()
                    ->label('Full Name'),
                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('mobile_no')
                    ->searchable()
                    ->label('Mobile'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->form([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('admission_no')
                                    ->disabled(),
                                TextInput::make('name')
                                    ->disabled(),
                                TextInput::make('email')
                                    ->disabled(),
                                TextInput::make('mobile')
                                    ->disabled(),
                            ]),
                    ]),
                //Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
