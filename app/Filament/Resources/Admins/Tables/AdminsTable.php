<?php

namespace App\Filament\Resources\Admins\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class AdminsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable()
                    ->label('Name'),
                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('roles.name')
                    ->badge()
                    ->label('Role'),
                TextColumn::make('created_at')
                    ->date()
                    ->label('Last Active')
                    ->sortable(),
                TextColumn::make('independent_login')
                    ->badge()
                    ->state(fn ($record) => 'Active') // Placeholder status for now
                    ->color('success')
                    ->label('Status'),
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
