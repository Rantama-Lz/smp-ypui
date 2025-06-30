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
            'guru_id' =>    1,
            'tahun_ajaran_id' => 1,
        ]);
        Kelas::create([
            'nama_kelas' => 'VII B',
            'guru_id' =>    2,
            'tahun_ajaran_id' => 1,
        ]);
        Kelas::create([
            'nama_kelas' => 'VII C',
            'guru_id' =>    3,
            'tahun_ajaran_id' => 1,
        ]);
        Kelas::create([
            'nama_kelas' => 'VII D',
            'guru_id' =>    4,
            'tahun_ajaran_id' => 1,
        ]);
        Kelas::create([
            'nama_kelas' => 'VIII A',
            'guru_id' =>    5,
            'tahun_ajaran_id' => 1,
        ]);
        Kelas::create([
            'nama_kelas' => 'VIII B',
            'guru_id' =>    6,
            'tahun_ajaran_id' => 1,
        ]);
         Kelas::create([
            'nama_kelas' => 'VIII C',
            'guru_id' =>    7,
            'tahun_ajaran_id' => 1,
        ]);
         Kelas::create([
            'nama_kelas' => 'VIII D',
            'guru_id' =>    8,
            'tahun_ajaran_id' => 1,
        ]);
         Kelas::create([
            'nama_kelas' => 'IX A',
            'guru_id' =>    9,
            'tahun_ajaran_id' => 1,
        ]);
         Kelas::create([
            'nama_kelas' => 'IX B',
            'guru_id' =>    10,
            'tahun_ajaran_id' => 1,
        ]);
         Kelas::create([
            'nama_kelas' => 'IX C',
            'guru_id' =>    11,
            'tahun_ajaran_id' => 1,
        ]);
         Kelas::create([
            'nama_kelas' => 'IX D',
            'guru_id' =>    12,
            'tahun_ajaran_id' => 1,
        ]);
    }
}
