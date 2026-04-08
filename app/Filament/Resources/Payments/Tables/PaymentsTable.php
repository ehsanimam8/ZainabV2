<?php

namespace App\Filament\Resources\Payments\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.email')->sortable()->searchable(),
                TextColumn::make('amount')->money('usd')->sortable(),
                TextColumn::make('status')->badge()->searchable()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'completed',
                        'danger' => fn ($state) => in_array($state, ['failed', 'refunded']),
                    ]),
                TextColumn::make('payment_method')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
