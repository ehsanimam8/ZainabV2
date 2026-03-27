<?php

namespace App\Filament\Resources\ParentHouseholds\Pages;

use App\Filament\Resources\ParentHouseholds\ParentHouseholdResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListParentHouseholds extends ListRecords
{
    protected static string $resource = ParentHouseholdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->slideOver(),
        ];
    }
}
