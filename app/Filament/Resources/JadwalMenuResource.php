<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\JadwalMenuResource\Pages;
use App\Filament\Resources\JadwalMenuResource\RelationManagers;
use App\Models\JadwalMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JadwalMenuResource extends Resource
{
    protected static ?string $model = JadwalMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_jadwal')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Jadwal'),
                
                DatePicker::make('tanggal_mulai')
                    ->required()
                    ->label('Tanggal Mulai')
                    ->minDate(now())
                    ->helperText('Pilih tanggal mulai jadwal'),
                
                DatePicker::make('tanggal_selesai')
                    ->required()
                    ->label('Tanggal Selesai')
                    ->after('tanggal_mulai')  // Tanggal selesai setelah tanggal mulai
                    ->helperText('Pilih tanggal selesai jadwal'),

                FileUpload::make('poster_url')
                    ->label('Upload Poster')
                    ->directory('posters')
                    ->image()
                    ->maxSize(1024)  // Maksimal ukuran file 1MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png']) // Validasi file yang diterima
                    ->helperText('Upload poster gambar untuk jadwal menu'),

                Repeater::make('menuHarians')
                    ->relationship()
                    ->label('Menu Harian')
                    ->schema([
                        TextInput::make('hari')
                            ->required()
                            ->label('Hari'),
                        
                        DatePicker::make('tanggal')
                            ->required()
                            ->label('Tanggal'),
                        
                        Repeater::make('produkMenus')
                            ->relationship()
                            ->label('Produk Menu')
                            ->schema([
                                Select::make('produk_id')
                                    ->relationship('produk', 'nama_produk')
                                    ->searchable()
                                    ->preload()
                                    ->label('Produk')
                                    ->createOptionForm([
                                        TextInput::make('nama_produk')->required(),
                                        TextInput::make('satuan')->required(),
                                        TextInput::make('harga_default')->numeric()->required(),
                                        Textarea::make('keterangan'),
                                        TextInput::make('jumlah_standar_unit')->numeric()->default(1),
                                    ]),

                                TextInput::make('harga_menu')
                                    ->numeric()
                                    ->required()
                                    ->label('Harga Menu'),

                                Textarea::make('keterangan_tambahan')
                                    ->label('Keterangan Tambahan'),
                            ]),
                    ])
            ]);
    }    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                
                TextColumn::make('nama_jadwal')
                    ->searchable()
                    ->label('Nama Jadwal'),
                
                TextColumn::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date(),
                
                TextColumn::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->date(),
                
                TextColumn::make('user.name')
                    ->label('Dibuat oleh'),
            ])
            ->filters([ 
                // Filter can be added here if needed in the future
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
            // Add any relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalMenus::route('/'),
            'create' => Pages\CreateJadwalMenu::route('/create'),
            'edit' => Pages\EditJadwalMenu::route('/{record}/edit'),
        ];
    }
}
