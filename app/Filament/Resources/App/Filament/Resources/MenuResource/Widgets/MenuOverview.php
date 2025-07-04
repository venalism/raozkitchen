<?php

namespace App\Filament\Resources\MenuResource\Widgets;

use App\Models\Menu;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MenuOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalMenus = Menu::count();
        $averagePrice = Menu::avg('harga');

        return [
            Stat::make('Jumlah Menu', $totalMenus)
                ->description('Total seluruh menu')
                ->color('success'),

            Stat::make('Rata-rata Harga', 'Rp ' . number_format($averagePrice ?? 0, 0, ',', '.'))
                ->description('Harga rata-rata menu saat ini')
                ->color('info'),
        ];
    }
}
