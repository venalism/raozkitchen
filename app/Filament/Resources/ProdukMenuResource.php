<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ProdukMenuResource\Pages;
use App\Models\ProdukMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdukMenuResource extends Resource
{
    protected static ?string $model = ProdukMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Relasi ke Menu Harian
                Select::make('menu_harian_id')
                    ->relationship('menuHarian', 'tanggal')
                    ->required()
                    ->label('Menu Harian (Tanggal)')
                    ->searchable()
                    ->preload()
                    ->helperText('Pilih tanggal menu harian yang relevan'),

                // Relasi ke Produk
                Select::make('produk_id')
                    ->relationship('produk', 'nama_produk')
                    ->required()
                    ->label('Produk')
                    ->searchable()
                    ->preload()
                    ->helperText('Pilih produk yang akan ditampilkan di menu'),

                // Harga Menu
                TextInput::make('harga_menu')
                    ->numeric()
                    ->required()
                    ->label('Harga Spesial Hari Itu')
                    ->helperText('Masukkan harga spesial untuk produk pada hari tersebut')
                    ->minValue(0), // Menjamin harga tidak boleh negatif

                // Catatan Tambahan
                Textarea::make('keterangan_tambahan')
                    ->label('Catatan Tambahan (Opsional)')
                    ->helperText('Masukkan catatan tambahan jika diperlukan, misalnya detail mengenai cara penyajian produk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom ID
                TextColumn::make('id')
                    ->sortable()
                    ->label('ID')
                    ->searchable(),

                // Kolom Hari dari Menu Harian
                TextColumn::make('menuHarian.hari')
                    ->label('Hari')
                    ->sortable()
                    ->searchable(),

                // Kolom Tanggal dari Menu Harian
                TextColumn::make('menuHarian.tanggal')
                    ->label('Tanggal')
                    ->sortable()
                    ->date('d/m/Y'), // Format tanggal dd/mm/yyyy

                // Nama Produk
                TextColumn::make('produk.nama_produk')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable(),

                // Harga Menu
                TextColumn::make('harga_menu')
                    ->label('Harga')
                    ->money('IDR', true) // Format uang
                    ->sortable(),

                // Catatan Tambahan
                TextColumn::make('keterangan_tambahan')
                    ->limit(30) // Batasi panjang untuk tampilan tabel
                    ->label('Catatan Tambahan'),
            ])
            ->filters([ 
                // Filters bisa ditambahkan nanti
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
            // Relasi bisa ditambahkan jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProdukMenus::route('/'),
            'create' => Pages\CreateProdukMenu::route('/create'),
            'edit' => Pages\EditProdukMenu::route('/{record}/edit'),
        ];
    }
}
