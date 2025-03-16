<?php

namespace App\Filament\Resources;

use App\Enum\DaysEnum;
use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Course';

    protected static ?string $navigationGroup = 'Course Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name of Course')
                            ->required(),
                        Select::make('classroom_id')
                            ->label('Classroom')
                            ->relationship('classroom', 'name')
                            ->searchable(),
                        TextInput::make('max_student_limit')
                            ->label('Max. Student Limit')
                            ->numeric()
                            ->required(),
                        Textarea::make('description')
                            ->columnSpanFull()
                            ->autosize(),
                        Select::make('day')
                            ->label('Day')
                            ->options(
                                array_column(DaysEnum::cases(), 'value', 'value')
                            )
                            ->required(),
                        TimePicker::make('start_time')
                            ->label('Starting At')
                            ->required(),
                        TimePicker::make('end_time')
                            ->label('Ending At')
                            ->required(),
                        DatePicker::make('starting_date')
                            ->label('Starting Date')
                            ->format('Y-m-d')
                            ->required(),
                        DatePicker::make('ending_date')
                            ->label('Ending Date')
                            ->format('Y-m-d')
                            ->required(),
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
                    ->label('Name of Course')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('day')
                    ->label('Day')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('start_time')
                    ->label('Start Time')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('end_time')
                    ->label('End Time')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('starting_date')
                    ->label('Starting Date')
                    ->date()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ending_date')
                    ->label('Ending Date')
                    ->date()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('max_student_limit')
                    ->label('Max Student Limit')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}
