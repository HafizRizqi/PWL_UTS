<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penjualanDetail extends Model
{
    //
    use HasFactory;
    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';
 
    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah',
    ];

        public function barang()
        {
            return $this->belongsTo(Barang::class, 'barang_id', 'barang_id');
        }
 
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'penjualan_id');
    }
 
    public function getTotalAttribute(): int
    {
        return $this->penjualan->sum(fn($p) => $p->harga * $p->jumlah);
    }
}
