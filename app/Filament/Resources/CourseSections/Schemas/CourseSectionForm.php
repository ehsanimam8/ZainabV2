<?php

namespace App\Filament\Resources\CourseSections\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;

class CourseSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Course / Section Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()->label('Section Name *')
                            ->placeholder('e.g. Arabic 101 — Mon/Wed Section')
                            ->columnSpanFull(),
                        Select::make('course_id')->label('Course')
                            ->options(\App\Models\Course::pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('lead_teacher_id')->label('Lead Teacher')
                            ->options(\App\Models\User::role('instructor')->pluck('name', 'id'))
                            ->searchable(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Schedule')
                    ->schema([
                        \Filament\Forms\Components\CheckboxList::make('days_of_week')->label('Days of the Week')
                            ->options([
                                'Sunday' => 'Sunday',
                                'Monday' => 'Monday',
                                'Tuesday' => 'Tuesday',
                                'Wednesday' => 'Wednesday',
                                'Thursday' => 'Thursday',
                                'Friday' => 'Friday',
                                'Saturday' => 'Saturday',
                            ])
                            ->columns(4)
                            ->columnSpanFull(),
                        TimePicker::make('start_time')->label('Start Time'),
                        TimePicker::make('end_time')->label('End Time'),
                        TextInput::make('room_location')->label('Room / Location')
                            ->placeholder('e.g. Room 104, Main Building'),
                        TextInput::make('max_capacity')->label('Max Capacity')
                            ->numeric()->placeholder('e.g. 20'),
                        DatePicker::make('start_date')->label('Start Date')
                            ->native(false)->displayFormat('d/m/Y'),
                        DatePicker::make('end_date')->label('End Date')
                            ->native(false)->displayFormat('d/m/Y'),
                        Textarea::make('notes')->label('Notes (optional)')
                            ->placeholder('Any special requirements, prerequisites, or notes...')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
