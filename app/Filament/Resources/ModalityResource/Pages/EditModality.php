<?php

namespace App\Filament\Resources\ModalityResource\Pages;

use App\Filament\Resources\ModalityResource;
use Filament\Resources\Pages\EditRecord;

class EditModality extends EditRecord
{
    protected static string $resource = ModalityResource::class;

    protected function beforeSave(): void
    {
        //TO-DO: Check if file exists in disk
    }
}
