<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\CustomField;

class CustomFieldsPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-squares-plus';
    protected static string|\UnitEnum|null $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Custom Fields';
    protected string $view = 'filament.pages.custom-fields-page';

    public $customFields;

    public function mount()
    {
        $this->customFields = CustomField::all();
    }
}
