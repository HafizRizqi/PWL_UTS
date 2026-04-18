<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Level extends Model
{
    //
    use HasFactory;
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';

    protected $fillable = [
        'level_kode',
        'level_nama',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'level_id', 'level_id');
    }

}
