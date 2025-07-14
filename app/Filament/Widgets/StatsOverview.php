<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MapelMaster;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 3;
    protected function getStats(): array
    {

        $mapelCount = MapelMaster::count();
        $tahunajaranAktif = TahunAjaran::where('active', true)->first();
        $jumlahKelas = Kelas::where('tahun_ajaran_id', $tahunajaranAktif->id)->count();
        
        // foreach ($tahunajaranAktif as $tahun) {
        // $jumlahKelas = Kelas::where('tahun_ajaran_id', $tahun->id)->count();
    
        // $stats[] = Stat::make("Tahun Ajaran $tahun->nama_tahun",  "$jumlahKelas Kelas");
        // }
        // $stats[] = Stat::make('Jumlah Mata Pelajaran', MapelMaster::count());

        // return $stats;
        return [
            Stat::make('Tahun Ajaran Aktif', $tahunajaranAktif->nama_tahun),
            Stat::make('Jumlah Kelas Aktif', $jumlahKelas),
            Stat::make('Jumlah Mata Pelajaran', $mapelCount),
        ];
        
        
    }
    protected ?string $heading = 'Statistik Akademik';
}
