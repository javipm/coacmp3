<?php

namespace App\Filament\Resources\ModalityResource\Pages;

use App\Filament\Resources\ModalityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModalities extends ListRecords
{
    protected static string $resource = ModalityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
