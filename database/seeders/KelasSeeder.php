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
            'tingkat_kelas_id' => 1,
            'nama_kelas' => '7 A',
        ]);
        Kelas::create([
            'tingkat_kelas_id' => 1,
            'nama_kelas' => '7 B',
        ]);
        Kelas::create([
            'tingkat_kelas_id' => 1,
            'nama_kelas' => '7 C',
        ]);
        Kelas::create([
            'tingkat_kelas_id' => 1,
            'nama_kelas' => '7 D',
        ]);
        Kelas::create([
            'tingkat_kelas_id' => 2,
            'nama_kelas' => '8 A',
        ]);
        Kelas::create([
            'tingkat_kelas_id' => 2,
            'nama_kelas' => '8 B',
        ]);
         Kelas::create([
            'tingkat_kelas_id' => 2,
            'nama_kelas' => '8 C',
        ]);
         Kelas::create([
            'tingkat_kelas_id' => 2,
            'nama_kelas' => '8 D',
        ]);
         Kelas::create([
            'tingkat_kelas_id' => 3,
            'nama_kelas' => '9 A',
        ]);
         Kelas::create([
            'tingkat_kelas_id' => 3,
            'nama_kelas' => '9 B',
        ]);
         Kelas::create([
            'tingkat_kelas_id' => 3,
            'nama_kelas' => '9 C',
        ]);
         Kelas::create([
            'tingkat_kelas_id' => 3,
            'nama_kelas' => '9 D',
        ]);
        
    }
}
