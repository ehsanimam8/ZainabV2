<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Event Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->columnSpanFull(),
                        Select::make('type')
                            ->options([
                                'Virtual' => 'Virtual',
                                'In-Person' => 'In-Person',
                                'Hybrid' => 'Hybrid',
                            ])->required(),
                        TextInput::make('location')
                            ->label('Location / Link')
                            ->maxLength(255),
                        Select::make('status')
                            ->options([
                                'Draft' => 'Draft',
                                'Published' => 'Published',
                                'Cancelled' => 'Cancelled',
                            ])->default('Draft')->required(),
                    ])->columns(2),
                
                Section::make('Scheduling & Registration')
                    ->schema([
                        DateTimePicker::make('start_date')->required(),
                        DateTimePicker::make('end_date')->required(),
                        DateTimePicker::make('registration_opens_at'),
                        DateTimePicker::make('registration_closes_at'),
                    ])->columns(2),

                Section::make('Ticketing & Pricing')
                    ->schema([
                        Select::make('pricing_type')
                            ->options([
                                'Free' => 'Free',
                                'Paid' => 'Paid',
                                'Donation Based' => 'Donation Based',
                            ])->default('Free')->required(),
                        TextInput::make('ticket_price')->numeric()->prefix('$'),
                        TextInput::make('mock_registrants')
                            ->label('Mock Registrant Count')
                            ->numeric()
                            ->default(0),
                    ])->columns(3),
            ]);
    }
}
