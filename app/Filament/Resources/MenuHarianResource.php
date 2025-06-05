<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\MenuHarianResource\Pages;
use App\Models\MenuHarian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MenuHarianResource extends Resource
{
    protected static ?string $model = MenuHarian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Relasi Jadwal Menu
                Select::make('jadwal_menu_id')
                    ->relationship('jadwalMenu', 'nama_jadwal')
                    ->required()
                    ->label('Jadwal Menu')
                    ->searchable()
                    ->preload()
                    ->helperText('Pilih jadwal menu yang sudah ada'),

                // Kolom untuk Hari
                TextInput::make('hari')
                    ->required()
                    ->label('Hari (ex: Senin, Selasa, dll)')
                    ->helperText('Masukkan hari yang sesuai dalam format bahasa Indonesia, misalnya Senin, Selasa, dll.')
                    ->maxLength(20)
                    ->required(),

                // Kolom untuk Tanggal
                DatePicker::make('tanggal')
                    ->required()
                    ->label('Tanggal')
                    ->helperText('Pilih tanggal untuk menu harian')
                    ->minDate(now()) // Menjamin hanya tanggal hari ini atau yang akan datang
                    ->date(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ID Menu Harian
                TextColumn::make('id')
                    ->sortable()
                    ->label('ID')
                    ->searchable(),

                // Nama Jadwal Menu yang Dihubungkan
                TextColumn::make('jadwalMenu.nama_jadwal')
                    ->label('Jadwal')
                    ->sortable()
                    ->searchable(),

                // Menampilkan Hari
                TextColumn::make('hari')
                    ->sortable()
                    ->label('Hari')
                    ->searchable(),

                // Tanggal Menu Harian
                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->sortable()
                    ->date('d/m/Y'), // Format tanggal dd/mm/yyyy
            ])
            ->filters([ 
                // Jika perlu, filter bisa ditambahkan di sini
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Jika ada relasi tambahan, bisa ditambahkan di sini
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuHarians::route('/'),
            'create' => Pages\CreateMenuHarian::route('/create'),
            'edit' => Pages\EditMenuHarian::route('/{record}/edit'),
        ];
    }
}
