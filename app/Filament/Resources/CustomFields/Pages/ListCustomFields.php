<?php

namespace App\Filament\Resources\CustomFields\Pages;

use App\Filament\Resources\CustomFields\CustomFieldResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomFields extends ListRecords
{
    protected static string $resource = CustomFieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
