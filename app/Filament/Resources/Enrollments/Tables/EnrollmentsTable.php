<?php

namespace App\Filament\Resources\Enrollments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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
