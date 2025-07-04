<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hari extends Model
{
    use HasFactory;

    protected $fillable = ['nama_hari']; // Agar bisa mass-assignment

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
