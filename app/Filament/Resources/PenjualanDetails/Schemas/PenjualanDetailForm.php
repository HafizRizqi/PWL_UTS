<?php

namespace App\Filament\Resources\PenjualanDetails\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Date;

class PenjualanDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('Kode Penjualan')
                    ->relationship('penjualan', 'penjualan_kode')
                    ->required(),
                Select::make('Nama Barang')
                    ->relationship('barang', 'barang_nama')
                    ->required(),
                Select::make('harga')
                    ->required()
                    ->relationship('barang', 'harga_jual'),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('created_at')
                    ->label('Tanggal Penjualan')
                    ->default(fn() => Date::now())
                    ->required(),
            ]);
    }
}
