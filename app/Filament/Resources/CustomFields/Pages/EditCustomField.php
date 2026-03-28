<?php

namespace App\Filament\Resources\CustomFields\Pages;

use App\Filament\Resources\CustomFields\CustomFieldResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomField extends EditRecord
{
    protected static string $resource = CustomFieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
