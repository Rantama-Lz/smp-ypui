<?php

namespace Database\Seeders;

use App\Models\Spp;
use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunajaranList = TahunAjaran::all();
        $activeYears = $tahunajaranList->where('active', true);
        if ($activeYears->isEmpty()) {
            $this->command->warn('Tidak ada tahun ajaran yang aktif.');
            return;
        }
        $bulans = ['Januari', 'Februari', 'Maret', 'April','Mei', 'Juni', 'Juli', 'Agustus','September', 'Oktober', 'November', 'Desember'];

        if ($tahunajaranList->isEmpty()) {
        $this->command->warn('Seeder dibatalkan: Pastikan ada data tahun ajaran.');
        return;
        }

        $activeYears = $tahunajaranList->where('active', true);
        if ($activeYears->isEmpty()) {
            $this->command->warn('Tidak ada tahun ajaran yang aktif.');
            return;
        }
        foreach ($activeYears as $tahunajaran) {
        foreach ($bulans as $bulan) {
            $exists = Spp::where('tahun_ajaran_id', $tahunajaran->id)
                ->where('bulan', $bulan)
                ->exists();

            if (! $exists) {
                Spp::create([
                    'tahun_ajaran_id' => $tahunajaran->id,
                    'bulan' => $bulan,
                    'nominal' => 250000,
                ]);
            }
        }
    }

        $this->command->info('Seeder berhasil dijalankan: Data SPP di-generate.');
    }
}
