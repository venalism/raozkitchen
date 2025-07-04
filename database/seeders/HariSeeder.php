<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hari;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hari::insert([
            ['nama_hari' => 'Senin'],
            ['nama_hari' => 'Selasa'],
            ['nama_hari' => 'Rabu'],
            ['nama_hari' => 'Kamis'],
            ['nama_hari' => 'Jumat'],
            ['nama_hari' => 'Sabtu'],
        ]);        
    }
}
