<?php

namespace App\Filament\Resources\GroupsActingsResource\Pages;

use App\Filament\Resources\GroupsActingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGroupsActings extends ListRecords
{
    protected static string $resource = GroupsActingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
