<?php

namespace App\Filament\Resources\App\Filament\Resources\HariResource\Widgets;

use App\Models\Hari;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HariOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Hari', Hari::count())
                ->description('Hari yang terdaftar di sistem')
                ->color('success'),
        ];
    }
}
