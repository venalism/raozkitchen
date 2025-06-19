<?php

namespace App\Filament\Resources\App\Filament\WidgetsResource\Widgets;

use App\Models\JadwalMenu;
use App\Models\Produk;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    /**
     * @return array|Stat[]
     */
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Produk::count())
                ->description('Jumlah semua produk yang tersedia')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Total Jadwal Menu', JadwalMenu::count())
                ->description('Jumlah semua jadwal menu')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),

            Stat::make('Total Users', User::count())
                ->description('Jumlah pengguna terdaftar')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
