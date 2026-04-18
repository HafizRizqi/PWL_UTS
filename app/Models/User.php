<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'm_user';       // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; // Mendefinisikan primary key dari tabel yang digunakan

    /**
     * @var array
     */
    protected $fillable = ['level_id', 'username', 'nama','password'];

     protected $hidden = [
        'password',
        'remember_token',
    ]; 

    public function getFilamentName(): string
    {
        return (string) $this->nama;
    }

    public function getNameAttribute(): string
    {
        return (string) $this->nama;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }


    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id', 'level_id');
    }

    public function stoks(): HasMany
    {
        return $this->hasMany(Stock::class, 'user_id', 'user_id');
    }

    public function penjualans(): HasMany
    {
        return $this->hasMany(Penjualan::class, 'user_id', 'user_id');
    }
     protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

}
