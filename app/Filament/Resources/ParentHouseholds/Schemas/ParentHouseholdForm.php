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
                Section::make('Household Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Household / Family Name')
                            ->required()
                            ->placeholder('e.g. The Al-Rashid Family')
                            ->columnSpanFull(),
                    ]),

                Section::make('Family Members')
                    ->schema([
                        \Filament\Forms\Components\Repeater::make('users')
                            ->relationship('users')
                            ->label('Parents & Children')
                            ->schema([
                                TextInput::make('first_name')->required()->columnSpan(1),
                                TextInput::make('last_name')->required()->columnSpan(1),
                                TextInput::make('email')->email()->unique(table: 'users', column: 'email', ignoreRecord: true)->columnSpan(1),
                                TextInput::make('phone')->tel()->columnSpan(1),
                                Select::make('roles')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->createItemButtonLabel('Add Family Member')
                            ->itemLabel(fn (array $state): ?string => $state['first_name'] ?? null),
                    ]),
            ]);
    }
}
