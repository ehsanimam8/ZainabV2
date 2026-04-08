<?php

namespace App\Filament\Resources\ParentHouseholds\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use App\Models\User;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class ParentHouseholdsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Household Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('primary_contact')
                    ->label('Primary Contact')
                    ->state(fn ($record) => User::where('household_id', $record->id)->role('parent')->first()?->name ?? 'No Parent Linked')
                    ->description(fn ($record) => User::where('household_id', $record->id)->role('parent')->first()?->email ?? ''),
                TextColumn::make('children')
                    ->label('Children (Students)')
                    ->state(fn ($record) => User::where('household_id', $record->id)->role('student')->count() . ' Enrolled')
                    ->badge()
                    ->color('success'),
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
