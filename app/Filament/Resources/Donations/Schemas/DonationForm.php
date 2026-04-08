<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')->options(\App\Models\User::pluck('email', 'id'))->searchable(),
                TextInput::make('first_name')->required(),
                TextInput::make('last_name'),
                TextInput::make('email')->email()->required(),
                TextInput::make('amount')->numeric()->prefix('$')->required(),
                TextInput::make('currency')->default('USD')->required(),
                Select::make('status')
                    ->options([
                        'completed' => 'Completed',
                        'pending' => 'Pending',
                        'failed' => 'Failed',
                    ])->default('completed')->required(),
                TextInput::make('stripe_payment_intent_id')->label('Stripe Payment Intent ID'),
                TextInput::make('campaign_name'),
            ]);
    }
}
