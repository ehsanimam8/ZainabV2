<?php

namespace App\Filament\Resources\Enrollments\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\Action as TableAction; // Fallback namespace
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class EnrollmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.email')->sortable()->searchable(),
                TextColumn::make('program.name')->sortable()->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->searchable()
                    ->colors([
                        'warning' => 'Pending',
                        'success' => fn ($state) => in_array($state, ['Active', 'Completed']),
                        'danger' => fn ($state) => in_array($state, ['Failed', 'Expired', 'Withdrawn', 'Abandoned']),
                        'secondary' => 'Suspended',
                    ]),
                TextColumn::make('enrollment_date')->date()->sortable(),
                TextColumn::make('payment_plan')->searchable(),
                TextColumn::make('reactivation_count')->numeric()->sortable(),
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
