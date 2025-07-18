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
            'kelas' => '7',
        ]);
        TingkatKelas::create([
            'kelas' => '8',
        ]);
        TingkatKelas::create([
            'kelas' => '9',
        ]);
    }
}
