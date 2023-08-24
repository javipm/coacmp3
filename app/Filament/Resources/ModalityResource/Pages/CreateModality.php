<?php

namespace App\Filament\Resources\ModalityResource\Pages;

use App\Filament\Resources\ModalityResource;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateModality extends CreateRecord
{
    protected static string $resource = ModalityResource::class;

    protected function beforeCreate(): void
    {
        //TO-DO: Check if file exists in disk
        // if (! $this->getRecord()->team->subscribed()) {
        //     Notification::make()
        //         ->warning()
        //         ->title('You don\'t have an active subscription!')
        //         ->body('Choose a plan to continue.')
        //         ->persistent()
        //         ->actions([
        //             Action::make('subscribe')
        //                 ->button()
        //                 ->url(route('subscribe'), shouldOpenInNewTab: true),
        //         ])
        //         ->send();

        //     $this->halt();
        // }
    }
}
