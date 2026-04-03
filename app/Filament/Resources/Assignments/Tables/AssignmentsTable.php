<?php

namespace App\Filament\Resources\Assignments\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssignmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.name')
                    ->label('Course')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('lesson.title')
                    ->label('Lesson')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('type')
                    ->searchable(),
                TextColumn::make('total_points')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('due_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('time_limit_minutes')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('max_attempts')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('passing_score_percent')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ViewAction::make(),
                EditAction::make()->slideOver(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
