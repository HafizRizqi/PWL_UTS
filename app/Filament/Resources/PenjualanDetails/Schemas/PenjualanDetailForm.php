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
                Select::make('penjualan_id')
                    ->relationship('penjualan', 'penjualan_id')
                    ->required(),
                Select::make('barang_id')
                    ->relationship('barang', 'barang_id')
                    ->required(),
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
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
