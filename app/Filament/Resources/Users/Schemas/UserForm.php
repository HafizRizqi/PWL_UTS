<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\Level;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Select::make('level_id')
                ->label('Level')
                ->options(Level::pluck('level_nama', 'level_id'))
                ->required()
                ->searchable(),
                TextInput::make('username')
                ->label('Username')
                ->required()
                ->maxLength(20)
                ->unique(ignoreRecord: true),
                TextInput::make('nama')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(100),
                TextInput::make('password')
                ->label('Password')
                ->password()
                ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                ->dehydrated(fn($state) => filled($state))
                ->required(fn(string $context) => $context === 'create')
                ->maxLength(255),
            ]);

    }
}
