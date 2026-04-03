<?php

namespace App\Filament\Resources\Teachers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\Action;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(['first_name', 'last_name', 'email'])
                    ->sortable()
                    ->description(fn ($record) => $record->email)
                    ->label('Teacher'),
                TextColumn::make('metadata.department')
                    ->label('Department')
                    ->placeholder('N/A'),
                TextColumn::make('sections')
                    ->state(fn ($record) => \App\Models\CourseSection::where('lead_teacher_id', $record->id)->pluck('name')->implode(', ') ?: 'None')
                    ->label('Assigned Sections'),
                TextColumn::make('status')
                    ->badge()
                    ->state(fn ($record) => 'Active') // Placeholder until Status Enum is built
                    ->color('success')
                    ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('Portal')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn ($record) => '#') // TODO: wire to actual /portal logic
                    ->openUrlInNewTab(),
                EditAction::make()->slideOver(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
