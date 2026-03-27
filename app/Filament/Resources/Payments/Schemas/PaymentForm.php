<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')->options(\App\Models\User::pluck('email', 'id'))->searchable(),
                Select::make('enrollment_id')->options(\App\Models\Enrollment::with(['user', 'program'])->get()->mapWithKeys(fn($e) => [$e->id => ($e->user->email ?? 'Unknown') . ' - ' . ($e->program->name ?? 'Unknown')]))->searchable(),
                TextInput::make('amount')->numeric()->prefix('$')->required(),
                TextInput::make('currency')->default('USD')->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ])->default('pending')->required(),
                Select::make('payment_method')
                    ->options([
                        'stripe' => 'Stripe',
                        'cash' => 'Cash',
                        'bank_transfer' => 'Bank Transfer',
                    ])->required(),
                TextInput::make('stripe_payment_intent_id')->label('Stripe Payment Intent ID'),
                Textarea::make('notes')->columnSpanFull(),
            ]);
    }
}
