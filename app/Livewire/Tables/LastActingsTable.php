<?php

namespace App\Livewire\Tables;

use App\Models\GroupActing;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class LastActingsTable extends DataTableComponent
{
    protected $model = GroupActing::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setColumnSelectDisabled();
        $this->setPerPageVisibilityDisabled();
        $this->setSearchDisabled();
        $this->setPerPageAccepted([16]);
        $this->setPerPage(16);
        $this->setPaginationVisibilityStatus(false);

        $this->setDefaultSort('updated_at', 'desc');

        //Style
        $this->setTableWrapperAttributes([
            'default' => false,
            'class' => 'shadow-lg shadow-orange-200 border-b border-orange-200 overflow-y-scroll sm:overflow-hidden',
        ]);

        $this->setTableAttributes([
            'class' => 'table-auto',
        ]);

        $this->setTheadAttributes([
            'default' => false,
            'class' => 'bg-orange-600 font-title',
        ]);

        $this->setTdAttributes(function (Column $column) {
            return [
                'default' => false,
                'class' => 'border-b border-slate-100 p-2 pl-2 sm:pl-6 text-slate-500 text-xs md:text-sm',
            ];
        });

        $this->setThAttributes(function (Column $column) {
            return [
                'default' => false,
                'class' => 'pl-2 sm:pl-6 py-3 text-left text-xs font-medium whitespace-nowrap text-white uppercase tracking-wider',
            ];
        });

        $this->setThSortButtonAttributes(function (Column $column) {
            return [
                'default' => false,
                'class' => 'flex items-center space-x-1 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider group focus:outline-none',
            ];
        });
    }

    public function columns(): array
    {
        return [
            LinkColumn::make('Grupo')
                ->title(fn ($row) => $row->group->name)
                ->location(fn ($row) => '#')
                ->attributes(function ($row) {
                    return [
                        'class' => 'text-orange-600 hover:text-orange-800 hover:transition',
                    ];
                })
                ->sortable()
                ->searchable(),
            Column::make('Fase', 'phase')
                ->sortable(),
            Column::make('Añadido', 'updated_at')
                ->format(fn ($value) => date('d-m-Y', strtotime($value)))
                ->sortable(),
            LinkColumn::make('')
                ->title(fn ($row) => "<i class='bx bx-play-circle text-orange-600 text-lg hover:text-orange-800 hover:transition' ></i>")
                ->location(fn ($row) => '#'),
        ];
    }

    public function builder(): Builder
    {
        return GroupActing::query()->select('*')->orderBy('created_at', 'desc');
    }
}
