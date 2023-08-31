<?php

namespace App\Filament\Resources\GroupsResource\Widgets;

use App\Models\Group;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total', Group::all()->count()),
            Stat::make('Rellenos', Group::where('is_completed', true)->count())->color('success'),
            Stat::make('Sin rellenar', Group::where('is_completed', false)->count()),
        ];
    }
}
