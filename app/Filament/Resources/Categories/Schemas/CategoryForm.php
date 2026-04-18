<?php

namespace App\Filament\Resources\Categories\Schemas;

use Dom\Text;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('kategori_kode')
                    ->required()
                    ->label('Kode Kategori')
                    ->unique(ignoreRecord: true)
                    ->maxLength(10),
                TextInput::make('kategori_nama')
                    ->required()
                    ->label('Nama Kategori')
                    ->maxLength(100),

            ]);
    }
}
