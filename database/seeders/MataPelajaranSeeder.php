<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 1,
            'guru_id' =>    1,
            'tahun_ajaran_id' => 1
        ]);
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 2,
            'guru_id' =>    2,
            'tahun_ajaran_id' => 1
            
        ]);
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 3,
            'guru_id' =>    3,
            'tahun_ajaran_id' => 1
        ]);
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 4,
            'guru_id' =>    4,
            'tahun_ajaran_id' => 1
        ]);
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 5,
            'guru_id' =>    5,
            'tahun_ajaran_id' => 1
        ]);
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 6,
            'guru_id' =>    6,
            'tahun_ajaran_id' => 1
        ]);
          MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 7,
            'guru_id' =>    7,
            'tahun_ajaran_id' => 1
        ]);
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 8,
            'guru_id' =>    8,
            'tahun_ajaran_id' => 1
        ]);
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 9,
            'guru_id' =>    9,
            'tahun_ajaran_id' => 1
        ]);
        MataPelajaran::create([
            'tingkat_kelas_id' => 1,
            'mapel_master_id' => 10,
            'guru_id' =>    10,
            'tahun_ajaran_id' => 1
        ]);
    }
}
