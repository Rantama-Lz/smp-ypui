<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunajaranList = TahunAjaran::all();
        $kelasList = Kelas::all();
        $siswaList = Siswa::all();

        if ($tahunajaranList->isEmpty() || $kelasList->isEmpty() || $siswaList->isEmpty()) {
        $this->command->warn('Seeder dibatalkan: Pastikan ada data tahun ajaran, kelas, dan siswa.');
        return;
    }

    // Loop semua siswa dan assign ke kelas random di tahun ajaran aktif
    $activeYears = $tahunajaranList->where('active', true);

    if ($activeYears->isEmpty()) {
        $this->command->warn('Tidak ada tahun ajaran yang aktif.');
        return;
    }

    foreach ($siswaList as $siswa) {
        foreach ($activeYears as $tahun) {
            $kelasTahunIni = $kelasList->where('tahun_ajaran_id', $tahun->id);

            if ($kelasTahunIni->isEmpty()) {
                continue;
            }

            $kelas = $kelasTahunIni->random();

            SiswaKelas::updateOrCreate(
                [
                    'siswa_id' => $siswa->id,
                    'tahun_ajaran_id' => $tahun->id,
                ],
                [
                    'kelas_id' => $kelas->id,
                ]
            );
        }
    }

    $this->command->info('Seeder SiswaKelas berhasil dijalankan.');
    }

    
}
