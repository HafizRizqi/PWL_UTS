<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penjualan extends Model
{
    //
    use HasFactory;
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
 
    protected $fillable = [
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal',
    ];
 
    protected $casts = [
        'penjualan_tanggal' => 'datetime',
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function penjualanDetail()
    {
        return $this->hasMany(PenjualanDetail::class, 'penjualan_id', 'penjualan_id');
    }
 
 
}
