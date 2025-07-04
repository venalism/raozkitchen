<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Filament\Resources\MenuResource\Widgets\MenuOverview;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_menu')
                    ->label('Nama Menu')
                    ->required()
                    ->maxLength(100),
                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                TextInput::make('satuan')
                    ->label('Satuan')
                    ->required()
                    ->maxLength(20),
                TextInput::make('stok')
                    ->label('Stok Tersedia')
                    ->numeric()
                    ->required(),
                Select::make('waktu')
                    ->label('Waktu')
                    ->options([
                        'siang' => 'Siang',
                        'sore' => 'Sore',
                    ])
                    ->placeholder('Sepanjang Hari')
                    ->nullable(),
                Select::make('hari_id')
                    ->label('Hari')
                    ->relationship('hari', 'nama_hari')
                    ->required(),
                Textarea::make('deskripsi')->rows(3),
                FileUpload::make('foto')
                        ->disk('public') // default disk untuk storage
                        ->directory('menus') // direktori simpan file
                        ->image()
                        ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_menu')
                    ->label('Menu')
                    ->searchable(),
                TextColumn::make('harga')
                    ->money('IDR')
                    ->label('Harga'),
                TextColumn::make('satuan'),
                BadgeColumn::make('stok')
                    ->colors([
                        'danger' => fn ($state) => $state == 0,
                        'warning' => fn ($state) => $state > 0 && $state <= 10,
                        'success' => fn ($state) => $state > 10,
                    ])
                    ->label('Stok'),
                TextColumn::make('waktu')
                    ->label('Waktu')
                    ->formatStateUsing(fn ($state) => $state ?? 'Sepanjang Hari'),
                TextColumn::make('hari.nama_hari')
                    ->label('Hari')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('hari_id')
                ->label('Filter Hari')
                ->relationship('hari', 'nama_hari'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            MenuOverview::class,
        ];
    }
}
