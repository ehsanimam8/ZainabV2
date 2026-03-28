<?php

namespace App\Filament\Resources\CustomFields\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;

class CustomFieldForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Field Configuration')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Select::make('entity')
                            ->options([
                                'User' => 'User Profile',
                                'Enrollment' => 'Enrollment Form',
                            ])->required(),
                        Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'select' => 'Select Dropdown',
                                'checkbox' => 'Checkbox',
                                'file' => 'File Upload',
                            ])->required(),
                        TextInput::make('placeholder')
                            ->maxLength(255),
                        Textarea::make('options')
                            ->label('Options (for select fields, comma separated)')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Visibility & Display')
                    ->schema([
                        Select::make('visibility')
                            ->options([
                                'Public' => 'Public (Visible to everyone)',
                                'Admin Only' => 'Admin Only',
                                'Hidden' => 'Hidden',
                            ])->default('Public')->required(),
                        Toggle::make('show_on_profile')
                            ->label('Show on User Profile')
                            ->default(true),
                        Toggle::make('show_on_registration')
                            ->label('Show on Registration Form')
                            ->default(false),
                    ])->columns(2),
            ]);
    }
}
