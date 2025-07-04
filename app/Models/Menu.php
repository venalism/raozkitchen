<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'harga',
        'satuan',
        'stok',
        'waktu',
        'hari_id',
        'deskripsi',
        'foto',
    ];

    public function hari()
    {
        return $this->belongsTo(Hari::class);
    }
}
