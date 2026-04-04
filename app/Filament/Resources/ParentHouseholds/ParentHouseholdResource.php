<?php

namespace App\Filament\Resources\ParentHouseholds;

use App\Filament\Resources\ParentHouseholds\Pages\CreateParentHousehold;
use App\Filament\Resources\ParentHouseholds\Pages\EditParentHousehold;
use App\Filament\Resources\ParentHouseholds\Pages\ListParentHouseholds;
use App\Filament\Resources\ParentHouseholds\Schemas\ParentHouseholdForm;
use App\Filament\Resources\ParentHouseholds\Tables\ParentHouseholdsTable;
use App\Models\Household;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ParentHouseholdResource extends Resource
{
    protected static ?string $model = Household::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $modelLabel = 'Parent Household';

    public static function form(Schema $schema): Schema
    {
        return ParentHouseholdForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ParentHouseholdsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListParentHouseholds::route('/'),
        ];
    }
}
