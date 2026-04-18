<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('supplier_kode')
                    ->required()
                    ->label('Kode Supplier')
                    ->unique(ignoreRecord: true)
                    ->maxLength(10),
                TextInput::make('supplier_nama')
                    ->required()
                    ->label('Nama Supplier')
                    ->maxLength(100),
                TextInput::make('supplier_alamat')
                    ->label('Alamat Supplier')
                    ->maxLength(255),
            ]);
    }
}
