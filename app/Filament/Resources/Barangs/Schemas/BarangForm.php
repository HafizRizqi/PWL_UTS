<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\Kategori;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                ->label('Kategori')
                ->options(Kategori::pluck('kategori_nama', 'kategori_id'))
                ->required()
                ->searchable(),
                TextInput::make('barang_kode')
                ->label('Kode Barang')
                ->required()
                ->maxLength(10)
                ->unique(ignoreRecord: true),
                TextInput::make('barang_nama')
                ->label('Nama Barang')
                ->required()
                ->maxLength(100),
                TextInput::make('harga_beli')
                ->label('Harga Beli')
                ->required()
                ->numeric()
                ->prefix('Rp'),
                TextInput::make('harga_jual')
                ->label('Harga Jual')
                ->required()
                ->numeric()
                ->prefix('Rp'),
            ]);
    }
}
