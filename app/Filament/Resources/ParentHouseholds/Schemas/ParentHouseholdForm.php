<?php

namespace App\Filament\Resources\ParentHouseholds\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;

class ParentHouseholdForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Primary Contact')
                    ->schema([
                        TextInput::make('first_name')->required()
                            ->label('First Name *')
                            ->placeholder('e.g. Omar')
                            ->dehydrated(false),
                        TextInput::make('last_name')->required()
                            ->label('Last Name *')
                            ->placeholder('e.g. Al-Rashid')
                            ->dehydrated(false),
                        TextInput::make('email')->email()->required()
                            ->label('Email Address *')
                            ->placeholder('parent@email.com')
                            ->dehydrated(false),
                        TextInput::make('mobile_phone')->tel()->required()
                            ->label('Mobile Phone *')
                            ->placeholder('+1 (555) 000-0000')
                            ->dehydrated(false),
                        TextInput::make('home_address')
                            ->label('Home Address')
                            ->placeholder('123 Main St, City, State ZIP')
                            ->columnSpanFull()
                            ->dehydrated(false),
                    ])->columns(2),

                Section::make('Children Linked to this Household')
                    ->schema([
                        Textarea::make('student_names')
                            ->label('Student Names (Existing or New)')
                            ->helperText('You can link students to this household later from the Students view.')
                            ->placeholder("List the names of children enrolled or to be enrolled. Separate by line.\ne.g. Zainab Al-Rashid (Age 10)\nHassan Al-Rashid (Age 8)")
                            ->rows(4)
                            ->columnSpanFull()
                            ->dehydrated(false),
                    ]),

                Section::make('Communication Preferences')
                    ->schema([
                        Select::make('preferred_language')->label('Preferred Language')
                            ->options([
                                'English' => 'English',
                                'Arabic' => 'Arabic',
                                'Urdu' => 'Urdu',
                                'French' => 'French',
                            ])->default('English')
                            ->dehydrated(false),
                        Select::make('contact_preference')->label('Contact Preference')
                            ->options([
                                'Email' => 'Email',
                                'SMS / Text' => 'SMS / Text',
                                'WhatsApp' => 'WhatsApp',
                                'Phone Call' => 'Phone Call',
                            ])->default('Email')
                            ->dehydrated(false),
                    ])->columns(2),
            ]);
    }
}
