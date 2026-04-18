<?php

namespace App\Filament\Resources\Stoks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\User;

class StoksForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Select::make('supplier_id')
                ->label('Supplier')
                ->options(Supplier::pluck('supplier_nama', 'supplier_id'))
                ->required()
                ->searchable(),
                Select::make('barang_id')
                ->label('Barang')
                ->options(Barang::pluck('barang_nama', 'barang_id'))
                ->required()
                ->searchable(),
                Select::make('user_id')
                ->label('Petugas')
                ->options(User::pluck('nama', 'user_id'))
                ->required(),
                DateTimePicker::make('stok_tanggal')
                ->label('Tanggal Masuk')
                ->required()
                ->default(now()),
                TextInput::make('stok_jumlah')
                ->label('Jumlah Stok')
                ->required()
                ->numeric()
                ->minValue(1),
            ]);
    }
}
