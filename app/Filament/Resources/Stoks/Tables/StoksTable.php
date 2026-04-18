<?php

namespace App\Filament\Resources\Stoks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class StoksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('stok_tanggal')->label('Tanggal')->dateTime('d M Y H:i')->sortable(),
                TextColumn::make('barang.barang_nama')->label('Barang')->searchable()->sortable(),
                TextColumn::make('supplier.supplier_nama')->label('Supplier')->searchable()->sortable(),
                TextColumn::make('stok_jumlah')->label('Jumlah')->sortable(),
                TextColumn::make('user.nama')->label('Petugas')->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
