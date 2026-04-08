<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->schema([
                        TextInput::make('first_name')->required()->label('First Name *')
                            ->placeholder('e.g. Sheikh Ahmad'),
                        TextInput::make('last_name')->required()->label('Last Name *')
                            ->placeholder('e.g. Al-Farsi'),
                        TextInput::make('email')->email()->required()->label('Email Address *')
                            ->placeholder('teacher@zainabcenter.com'),
                        TextInput::make('phone')->tel()->label('Phone Number')
                            ->placeholder('+1 (555) 000-0000'),
                    ])->columns(2),

                Section::make('Role & Qualifications')
                    ->schema([
                        Select::make('metadata.title')->label('Title / Role')
                            ->options([
                                'Teacher' => 'Teacher',
                                'Senior Teacher' => 'Senior Teacher',
                                'Ustadh / Sheikh' => 'Ustadh / Sheikh',
                                'Teaching Assistant' => 'Teaching Assistant',
                                'Volunteer Instructor' => 'Volunteer Instructor',
                            ]),
                        Select::make('metadata.employment_type')->label('Employment Type')
                            ->options([
                                'Full-time' => 'Full-time',
                                'Part-time' => 'Part-time',
                                'Volunteer' => 'Volunteer',
                                'Contract' => 'Contract',
                            ]),

                        TextInput::make('metadata.subjects')->label('Subjects / Specialization')
                            ->placeholder('e.g. Arabic Grammar, Quran Recitation...')
                            ->helperText('Comma-separated list of subjects')
                            ->columnSpanFull(),
                        DatePicker::make('metadata.start_date')->label('Start Date')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                        Select::make('gender')->label('Gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                                'Unspecified' => 'Unspecified'
                            ]),
                        Textarea::make('metadata.bio')->label('Short Bio')
                            ->placeholder('Brief background, qualifications, and teaching experience...')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
