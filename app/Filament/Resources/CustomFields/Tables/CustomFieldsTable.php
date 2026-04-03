<?php

namespace App\Filament\Resources\CustomFields\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class CustomFieldsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('entity')->searchable()->sortable(),
                TextColumn::make('type')->searchable(),
                TextColumn::make('visibility')->badge()->colors([
                    'success' => 'Public',
                    'warning' => 'Admin Only',
                    'danger' => 'Hidden',
                ]),
                IconColumn::make('show_on_profile')->boolean(),
                IconColumn::make('show_on_registration')->boolean(),
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
