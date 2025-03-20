<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LecturerResource\Pages;
use App\Filament\Resources\LecturerResource\RelationManagers;
use App\Models\User;
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
use Illuminate\Support\Facades\Hash;

class LecturerResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Lecturer';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->columnSpan(2),
                        TextInput::make('first_name')
                            ->label('First Name')
                            ->required(),
                        TextInput::make('last_name')
                            ->label('Last Name')
                            ->required(),
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn(string $context): bool => $context === 'create'),
                        Select::make('roles')
                            ->multiple()
                            ->relationship('roles', 'name'),
                        // Select::make('team_id')
                        //     ->label('Team')
                        //     ->relationship('team', 'name')
                        //     ->searchable()
                        //     ->required(),
                    ])->columnSpan(2)->columns(2),
                Section::make('Contact Details')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->prefixIcon('heroicon-s-envelope')
                            ->prefixIconColor('primary')
                            ->required(),
                        TextInput::make('mobile_no')
                            ->label('Mobile')
                            ->tel()
                            ->prefixIcon('heroicon-s-phone')
                            ->prefixIconColor('primary')
                            ->required(),
                    ])->columnSpan(1)->columns(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                return $query->isLecturer();
            });
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
            'index' => Pages\ListLecturers::route('/'),
            'create' => Pages\CreateLecturer::route('/create'),
            'edit' => Pages\EditLecturer::route('/{record}/edit'),
        ];
    }
}
