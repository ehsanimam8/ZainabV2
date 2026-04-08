<?php

namespace App\Filament\Resources\CmsPosts\Pages;

use App\Filament\Resources\CmsPosts\CmsPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCmsPost extends CreateRecord
{
    protected static string $resource = CmsPostResource::class;
}
