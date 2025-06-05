<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ProdukResource\Pages;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Nama Produk
                TextInput::make('nama_produk')
                    ->required()
                    ->label('Nama Produk')
                    ->helperText('Masukkan nama produk yang jelas dan deskriptif'),

                // Satuan Produk
                TextInput::make('satuan')
                    ->required()
                    ->label('Satuan (ex: porsi, cup, pcs)')
                    ->helperText('Misalnya: porsi, cup, pcs, dll'),

                // Harga Default
                TextInput::make('harga_default')
                    ->numeric()
                    ->required()
                    ->label('Harga Default')
                    ->helperText('Masukkan harga default produk dalam IDR')
                    ->minValue(0), // Menjamin harga tidak boleh negatif

                // Keterangan Tambahan
                Textarea::make('keterangan')
                    ->label('Keterangan (opsional)')
                    ->helperText('Masukkan keterangan tambahan tentang produk, jika diperlukan'),

                // Jumlah Standar Unit
                TextInput::make('jumlah_standar_unit')
                    ->numeric()
                    ->default(1)
                    ->label('Jumlah Standar')
                    ->helperText('Jumlah unit standar yang digunakan untuk produk ini')
                    ->minValue(1), // Menjamin jumlah unit tidak negatif

                // Toggle Aktif
                Toggle::make('is_active')
                    ->label('Produk Aktif')
                    ->default(true)
                    ->helperText('Tandai jika produk ini aktif dan tersedia untuk dijual'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom ID Produk
                TextColumn::make('id')
                    ->sortable()
                    ->label('ID')
                    ->searchable(),

                // Nama Produk
                TextColumn::make('nama_produk')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),

                // Satuan Produk
                TextColumn::make('satuan')
                    ->label('Satuan')
                    ->sortable(),

                // Harga Default dengan format uang
                TextColumn::make('harga_default')
                    ->label('Harga')
                    ->money('IDR', true) // Format mata uang
                    ->sortable(),

                // Jumlah Standar Unit
                TextColumn::make('jumlah_standar_unit')
                    ->label('Jumlah Standar')
                    ->sortable(),

                // Keterangan Produk
                TextColumn::make('keterangan')
                    ->limit(30) // Batasi panjang teks agar tidak terlalu panjang di tabel
                    ->label('Keterangan'),

                // Status Aktif Produk
                BooleanColumn::make('is_active')
                    ->label('Aktif')
                    ->sortable(),
            ])
            ->filters([ 
                // Filter bisa ditambahkan sesuai kebutuhan di masa depan
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
            // Relasi dapat ditambahkan jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
