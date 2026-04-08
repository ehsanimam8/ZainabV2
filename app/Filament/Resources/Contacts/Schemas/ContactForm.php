<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->options(\App\Models\User::pluck('email', 'id'))
                    ->searchable()
                    ->label('Linked User Account'),
                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Select::make('relationship_flags')
                    ->multiple()
                    ->options([
                        'Student' => 'Student',
                        'Donor' => 'Donor',
                        'Sponsor' => 'Sponsor',
                        'Event Attendee' => 'Event Attendee',
                        'Alumni' => 'Alumni',
                        'Volunteer' => 'Volunteer',
                    ]),
            ]);
    }
}
