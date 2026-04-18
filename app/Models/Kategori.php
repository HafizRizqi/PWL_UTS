<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    //
    use HasFactory;
    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';
    protected $fillable = [
        'kategori_kode',
        'kategori_nama',
    ];
    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id', 'kategori_id');
    }
}
