<?php

namespace App\Filament\Resources\Programs\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class ProgramsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('term.name')->sortable()->searchable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('category')->searchable()->sortable(),
                TextColumn::make('status')->badge()->searchable(),
                TextColumn::make('max_enrollment')->numeric()->sortable(),
                IconColumn::make('is_coaching')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()->slideOver(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
