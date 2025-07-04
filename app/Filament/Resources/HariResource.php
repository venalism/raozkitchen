<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HariResource\Pages;
use App\Filament\Resources\HariResource\RelationManagers;
use App\Models\Hari;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class HariResource extends Resource
{
    protected static ?string $model = Hari::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Hari';
    protected static ?string $pluralModelLabel = 'Hari';
    protected static ?string $slug = 'hari';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_hari')
                    ->label('Nama Hari')
                    ->required()
                    ->unique()
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('nama_hari')->label('Nama Hari')->searchable(),
                TextColumn::make('created_at')->dateTime('d M Y, H:i'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListHaris::route('/'),
            'create' => Pages\CreateHari::route('/create'),
            'edit' => Pages\EditHari::route('/{record}/edit'),
        ];
    }
}
