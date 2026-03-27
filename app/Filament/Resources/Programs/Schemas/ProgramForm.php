<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Program Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()->label('Program Name *')
                            ->placeholder('e.g. Arabic Language — Intermediate Level')
                            ->columnSpanFull(),
                        Textarea::make('description')->label('Description')
                            ->placeholder('What will students learn? Who is it for?')
                            ->columnSpanFull(),
                        Select::make('category')->label('Program Category')
                            ->options([
                                'Arabic Language' => 'Arabic Language',
                                'Quran Studies' => 'Quran Studies',
                                'Islamic Studies' => 'Islamic Studies',
                                'Fiqh & Jurisprudence' => 'Fiqh & Jurisprudence',
                                'Youth Program' => 'Youth Program',
                                'Children\'s Program' => 'Children\'s Program',
                                'Sisters\' Program' => 'Sisters\' Program',
                            ]),
                        Select::make('term_id')->label('Academic Term')
                            ->options(\App\Models\Term::pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Schedule & Capacity')
                    ->schema([
                        DatePicker::make('start_date')->label('Start Date')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                        DatePicker::make('end_date')->label('End Date')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                        TextInput::make('max_enrollment')->label('Maximum Enrollment')
                            ->numeric()
                            ->placeholder('e.g. 25')
                            ->minValue(1),
                        Select::make('status')
                            ->options([
                                'Draft' => 'Draft',
                                'Active' => 'Active',
                                'Archived' => 'Archived',
                            ])
                            ->default('Draft')
                            ->required(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('Pricing')
                    ->schema([
                        TextInput::make('registration_fee')->label('Registration Fee ($)')
                            ->numeric()->prefix('$')
                            ->placeholder('0.00'),
                        TextInput::make('monthly_fee')->label('Monthly Fee ($)')
                            ->numeric()->prefix('$')
                            ->placeholder('0.00'),
                        TextInput::make('full_fee')->label('Full Program Fee ($)')
                            ->numeric()->prefix('$')
                            ->placeholder('0.00'),
                    ])->columns(3),
                    
                Toggle::make('is_coaching')->label('1-on-1 Coaching Program')
                    ->columnSpanFull(),
            ]);
    }
}
