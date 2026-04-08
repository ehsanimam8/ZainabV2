<?php

namespace App\Filament\Resources\CmsPosts\Pages;

use App\Filament\Resources\CmsPosts\CmsPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCmsPost extends EditRecord
{
    protected static string $resource = CmsPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
