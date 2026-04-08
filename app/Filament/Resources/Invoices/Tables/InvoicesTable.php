<?php

namespace App\Filament\Resources\Invoices\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class InvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.email')->sortable()->searchable(),
                TextColumn::make('amount')->money('usd')->sortable(),
                TextColumn::make('status')->badge()->searchable()
                    ->colors([
                        'danger' => 'unpaid',
                        'success' => 'paid',
                        'secondary' => 'void',
                    ]),
                TextColumn::make('due_date')->date()->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\Action::make('record_payment')
                    ->label('Record Payment')
                    ->icon('heroicon-o-currency-dollar')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'unpaid')
                    ->form([
                        \Filament\Forms\Components\TextInput::make('amount')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->default(fn ($record) => $record->amount),
                        \Filament\Forms\Components\Select::make('payment_method')
                            ->options([
                                'stripe' => 'Credit Card (Stripe)',
                                'cash' => 'Cash',
                                'bank_transfer' => 'Bank Transfer',
                            ])
                            ->default('stripe')
                            ->required(),
                        \Filament\Forms\Components\Textarea::make('notes'),
                    ])
                    ->action(function ($record, array $data) {
                        \App\Models\Payment::create([
                            'user_id' => $record->user_id,
                            'enrollment_id' => $record->enrollment_id,
                            'invoice_id' => $record->id,
                            'amount' => $data['amount'],
                            'status' => 'completed',
                            'payment_method' => $data['payment_method'],
                            'notes' => $data['notes'],
                        ]);
                        
                        // For simplicity, mark invoice completely paid.
                        // (You could easily sum payment amounts against invoice amount here).
                        $record->update(['status' => 'paid']);
                        
                        \Filament\Notifications\Notification::make()->title('Payment Recorded!')->success()->send();
                    }),
                \Filament\Actions\Action::make('send_reminder')
                    ->label('Send Reminder')
                    ->icon('heroicon-o-envelope')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status === 'unpaid')
                    ->action(function ($record) {
                        if ($record->user) {
                            \App\Services\CommunicationService::sendTemplate('invoice_reminder', $record->user, [
                                'first_name' => $record->user->first_name ?? $record->user->name ?? 'Parent',
                                'amount' => number_format($record->amount, 2),
                                'due_date' => $record->due_date ? $record->due_date->format('M d, Y') : 'Immediately',
                            ]);
                            \Filament\Notifications\Notification::make()->title('Reminder Sent!')->success()->send();
                        }
                    }),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    \Filament\Actions\BulkAction::make('send_reminders')
                        ->label('Send Reminders to All Unpaid')
                        ->icon('heroicon-o-paper-airplane')
                        ->requiresConfirmation()
                        ->action(function (\Illuminate\Database\Eloquent\Collection $records) {
                            $count = 0;
                            foreach ($records as $record) {
                                if ($record->status === 'unpaid' && $record->user) {
                                    \App\Services\CommunicationService::sendTemplate('invoice_reminder', $record->user, [
                                        'first_name' => $record->user->first_name ?? $record->user->name ?? 'Parent',
                                        'amount' => number_format($record->amount, 2),
                                        'due_date' => $record->due_date ? $record->due_date->format('M d, Y') : 'Immediately',
                                    ]);
                                    $count++;
                                }
                            }
                            \Filament\Notifications\Notification::make()->title("Sent $count reminders!")->success()->send();
                        }),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
