<?php

namespace App\Livewire\Tables;

use App\Models\GroupActing;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class LastActingsTable extends DataTableComponent
{
    protected $model = GroupActing::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setTableWrapperAttributes([
            'default' => true,
            'class' => 'bg-orange-50',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make('Grupo', 'group.name')
                ->sortable()
                ->searchable(),
            Column::make('Fase', 'phase')
                ->sortable(),
            Column::make('Añadido', 'updated_at')
                ->sortable(),
        ];
    }
}
