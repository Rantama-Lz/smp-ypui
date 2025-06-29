<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TahunAjaran::create([
            'nama_tahun' => '2025/2026',
            'semester' =>   'Ganjil',
        ]);
        TahunAjaran::create([
            'nama_tahun' => '2025/2026',
            'semester' =>   'Genap',
        ]);
        TahunAjaran::create([
            'nama_tahun' => '2026/2027',
            'semester' =>   'Ganjil',
        ]);
        TahunAjaran::create([
            'nama_tahun' => '2026/2027',
            'semester' =>   'Genap',
        ]);
    }
}
