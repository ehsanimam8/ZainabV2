<?php

namespace App\Filament\Resources\Events\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('type')->searchable()->sortable(),
                TextColumn::make('status')->badge()->searchable()
                    ->colors([
                        'warning' => 'Draft',
                        'success' => fn ($state) => in_array($state, ['Published', 'Registration Open']),
                        'danger' => 'Cancelled',
                    ]),
                TextColumn::make('start_date')->dateTime()->sortable(),
                TextColumn::make('pricing_type')->searchable(),
                TextColumn::make('ticket_price')->money('usd')->sortable(),
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
