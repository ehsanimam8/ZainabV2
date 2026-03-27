<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(['first_name', 'last_name', 'email'])
                    ->sortable()
                    ->description(fn ($record) => $record->email)
                    ->label('Name'),
                TextColumn::make('metadata.target_program_id')
                    ->formatStateUsing(fn ($state) => \App\Models\Program::find($state)?->name ?? 'N/A')
                    ->label('Program')
                    ->badge()
                    ->color('info'),
                TextColumn::make('metadata.target_status')
                    ->badge()
                    ->default('Pending')
                    ->color(fn (string $state): string => match ($state) {
                        'Enrolled', 'Active' => 'success',
                        'Pending' => 'warning',
                        default => 'secondary',
                    })
                    ->label('Status'),
                TextColumn::make('metadata.enrollment_start_date')
                    ->date('M d, Y')
                    ->label('Enrolled Date')
                    ->placeholder('N/A'),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ViewAction::make(),
                \Filament\Tables\Actions\EditAction::make()->slideOver(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
