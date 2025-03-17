<?php

namespace App\Filament\Resources;

use App\Enum\DaysEnum;
use App\Filament\Resources\BatchResource\RelationManagers\UsersRelationManager;
use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
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

    protected static ?string $navigationGroup = 'Resources';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Details')
                    ->schema([
                        Select::make('batch_id')
                            ->label('Batch')
                            ->relationship('batch', 'name')
                            ->getOptionLabelFromRecordUsing(fn($record) =>
                            $record->name . ' (' . $record->from_year . ' - ' . $record->to_year . ')')
                            ->searchable(),
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

                TextColumn::make('batch.name')
                    ->label('Name of Batch')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Name of Course')
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->form([
                        Grid::make(2)
                            ->schema([
                                Select::make('batch_id')
                                    ->label('Batch')
                                    ->relationship('batch', 'name')
                                    ->getOptionLabelFromRecordUsing(fn($record) =>
                                    $record->name . ' (' . $record->from_year . ' - ' . $record->to_year . ')')
                                    ->searchable(),
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
                            ]),
                    ]),
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
            'students' => Pages\ManageCourseStudents::route('/{record}/students'),
        ];
    }
}
