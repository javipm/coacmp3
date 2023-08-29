<?php

namespace App\Filament\Resources\GroupsResource\Pages;

use App\Filament\Resources\GroupsResource;
use App\Library\SearchGroupInfo;
use App\Models\Author;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Livewire\Component;

class EditGroups extends EditRecord
{
    protected static string $resource = GroupsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('getinfo')
                ->label('Scrapear información')
                ->color('info')
                ->form([
                    Forms\Components\Placeholder::make('')->content('Desde esta opción podemos re-scrapear la info del grupo. Por defecto busca por el nombre de la agrupación.'),
                    Forms\Components\Placeholder::make('')->content('Lo más recomendable es editar el nombre de la agrupación y poner el correcto, pero puedes poner la URL de la página de donde quieres obtener los datos.'),
                    Forms\Components\TextInput::make('url')
                        ->label('URL')
                        ->activeUrl()
                        ->maxLength(255),
                ])
                ->action(function (array $data, Component $livewire): Notification {
                    $record = $this->getRecord();

                    $url = $data['url'] ?? '';
                    $result = SearchGroupInfo::getGroupInfo($record->name, $url);

                    if (! $result) {
                        return Notification::make()
                            ->warning()
                            ->title('Scrapeo finalizado')
                            ->body('No se ha podido obtener la información del grupo. Comprueba que el nombre es correcto.')
                            ->send();
                    }

                    $record->city = $result['city'];
                    $record->director = $result['director'];
                    $record->save();

                    foreach ($result['lyrics'] as $authorLyrics) {
                        $author = Author::where('name', $authorLyrics)->first();
                        if (! $author) {
                            $author = new Author();
                            $author->name = $authorLyrics;
                            $author->save();
                        }
                        $author->modalities()->syncWithoutDetaching($record->modality_id);
                        $record->authorsLyrics()->syncWithoutDetaching($author->id);
                    }

                    foreach ($result['music'] as $authorMusic) {
                        $author = Author::where('name', $authorMusic)->first();
                        if (! $author) {
                            $author = new Author();
                            $author->name = $authorMusic;
                            $author->save();
                        }
                        $author->modalities()->syncWithoutDetaching($record->modality_id);
                        $record->authorsMusic()->syncWithoutDetaching($author->id);
                    }

                    $this->refreshFormData([
                        'director',
                        'city',
                        'description',
                        'authors_lyrics_id',
                        'authors_music_id',
                    ]);

                    return Notification::make()
                        ->success()
                        ->title('Scrapeo finalizado')
                        ->body('Información del grupo obtenida.')
                        ->send();
                }),
            Actions\DeleteAction::make(),

        ];
    }
}
