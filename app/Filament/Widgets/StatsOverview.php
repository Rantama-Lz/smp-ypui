<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use App\Models\MapelMaster;
use App\Models\TahunAjaran;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    use HasWidgetShield;
    protected static ?int $sort = 3;
    protected function getStats(): array
    {

        $mapelCount = MapelMaster::count();
        $kelasCount = Kelas::count();
        $tahunajaranAktif = TahunAjaran::where('active', true)->first();
        $SiswaAktif = SiswaKelas::where('status', "Aktif")->count();
        
        // foreach ($tahunajaranAktif as $tahun) {
        // $jumlahKelas = Kelas::where('tahun_ajaran_id', $tahun->id)->count();
    
        // $stats[] = Stat::make("Tahun Ajaran $tahun->nama_tahun",  "$jumlahKelas Kelas");
        // }
        // $stats[] = Stat::make('Jumlah Mata Pelajaran', MapelMaster::count());

        // return $stats;
        return [
            Stat::make('Tahun Ajaran Aktif', $tahunajaranAktif->nama_tahun),
            Stat::make('Jumlah Kelas', $kelasCount),
            Stat::make('Jumlah Mata Pelajaran', $mapelCount),
        ];
        
        
    }
    protected ?string $heading = 'Statistik Akademik';
}
