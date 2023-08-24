<?php

namespace App\Filament\Resources\GroupsActingsResource\Pages;

use App\Filament\Resources\GroupsActingsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGroupsActings extends EditRecord
{
    protected static string $resource = GroupsActingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
