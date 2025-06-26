<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Kelas::create([
            'nama_kelas' => 'VII A',
        ]);
        Kelas::create([
            'nama_kelas' => 'VII B',
        ]);
        Kelas::create([
            'nama_kelas' => 'VII C',
        ]);
        Kelas::create([
            'nama_kelas' => 'VII D',
        ]);
        Kelas::create([
            'nama_kelas' => 'VIII A',
        ]);
        Kelas::create([
            'nama_kelas' => 'VIII B',
        ]);
         Kelas::create([
            'nama_kelas' => 'VIII C',
        ]);
         Kelas::create([
            'nama_kelas' => 'VIII D',
        ]);
         Kelas::create([
            'nama_kelas' => 'IX A',
        ]);
         Kelas::create([
            'nama_kelas' => 'IX B',
        ]);
         Kelas::create([
            'nama_kelas' => 'IX C',
        ]);
         Kelas::create([
            'nama_kelas' => 'IX D',
        ]);
    }
}
