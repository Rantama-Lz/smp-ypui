<?php

namespace Database\Seeders;

use App\Models\TingkatKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TingkatKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TingkatKelas::create([
            'kelas' => 'VII',
        ]);
        TingkatKelas::create([
            'kelas' => 'VIII',
        ]);
        TingkatKelas::create([
            'kelas' => 'IX',
        ]);
    }
}
