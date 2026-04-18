<?php

namespace App\Filament\Resources\Levels\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LevelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('level_kode')->label('Kode')->searchable()->sortable(),
                TextColumn::make('level_nama')->label('Nama Level')->searchable()->sortable(),
                TextColumn::make('created_at')->label('Dibuat')->dateTime('d M Y')->sortable(),
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
                ]),
            ]);
    }
}
