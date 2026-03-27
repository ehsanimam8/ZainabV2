<?php

namespace App\Filament\Resources\Admins\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;

class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Information')
                    ->schema([
                        TextInput::make('first_name')->required()
                            ->placeholder('e.g. Aisha'),
                        TextInput::make('last_name')->required()
                            ->placeholder('e.g. Siddiqui'),
                        TextInput::make('email')->email()->required()
                            ->helperText('An invitation email will be sent to this address.'),
                    ])->columns(2),

                Section::make('Role & Permissions')
                    ->schema([
                        Select::make('roles')
                            ->relationship('roles', 'name')
                            ->preload()
                            ->required()
                            ->helperText('Role permissions are predefined. You can customize permissions in Settings -> Admin Roles after creating this user.'),
                    ]),

                Section::make('Message (Optional)')
                    ->schema([
                        Textarea::make('metadata.invite_note')
                            ->label('Personal Note in Invite Email')
                            ->placeholder('Welcome to the team! We\'re glad to have you...')
                            ->rows(4),
                    ]),
            ]);
    }
}
