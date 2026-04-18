<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\User;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('penjualan_kode')
                    ->label('Kode Penjualan')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true)
                    ->default(fn() => 'TRX-' . now()->format('YmdHis')),
                Select::make('user_id')
                    ->label('Kasir')
                    ->options(User::pluck('nama', 'user_id'))
                    ->required(),
                    TextInput::make('pembeli')
                    ->label('Nama Pembeli')
                    ->maxLength(50),
                DateTimePicker::make('penjualan_tanggal')
                    ->label('Tanggal Penjualan')
                    ->required()
                    ->default(now()),

            ])->columns(2);
    }
}
