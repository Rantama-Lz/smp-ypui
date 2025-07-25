<?php

namespace App\Filament\Widgets;

use App\Models\Nilai;
use App\Models\GuruMapel;
use App\Models\MapelMaster;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class RekapNilai extends BaseWidget
{
    use HasWidgetShield;
    public static function getSort(): int
{
    $user = auth()->user();

    if ($user->hasRole('guru')) {
        return 1;
    }

    if ($user->hasRole('siswa')) {
        return 1;
    }

    return 10; // fallback untuk role lain
}
    
    protected ?string $heading = 'Akademik';
    protected function getCards(): array
    {
        $user = Auth::user();

        if ($user->hasRole('guru')) {
    $guruId = $user->guru?->id;
    $tahunajaranAktif = TahunAjaran::where('active', true)->first();
    $mapelList = GuruMapel::with('mapelmaster')
        ->where('guru_id', $guruId)
        ->get()
        ->pluck('mapelMaster.nama_mapel')
        ->toArray();

    $namaMapel = implode(', ', $mapelList); // ✅ Gabung jadi string

    return [
        Card::make("Mata Pelajaran yang Anda Ampu", "")
            ->description($namaMapel ?: '-')
            ->icon('heroicon-o-book-open'),
        Stat::make('Tahun Ajaran', $tahunajaranAktif?->nama_tahun ?? '-')
            ->icon('heroicon-s-calendar'),
    ];
}

       if ($user->hasRole('siswa')) {
    $siswaId = $user->siswa?->id;
    $tahunajaranAktif = TahunAjaran::where('active', true)->first();
    $siswaKelasAktif = \App\Models\SiswaKelas::with('kelas')
        ->where('siswa_id', $siswaId)
        ->where('tahun_ajaran_id', $tahunajaranAktif?->id)
        ->first();

    // Ambil nilai tertinggi dari tahun ajaran aktif
    $nilaiTertinggi = Nilai::whereHas('siswaKelas', function ($query) use ($siswaId, $tahunajaranAktif) {
            $query->where('siswa_id', $siswaId)
                  ->where('tahun_ajaran_id', $tahunajaranAktif?->id);
        })
        ->with('mapelMaster')
        ->orderByDesc('nilai_akhir')
        ->first();

    // Ambil nilai terendah dari tahun ajaran aktif
    $nilaiTerendah = Nilai::whereHas('siswaKelas', function ($query) use ($siswaId, $tahunajaranAktif) {
            $query->where('siswa_id', $siswaId)
                  ->where('tahun_ajaran_id', $tahunajaranAktif?->id);
        })
        ->with('mapelMaster')
        ->orderBy('nilai_akhir')
        ->first();

    return [
        Card::make(
            'Nilai Tertinggi', $nilaiTertinggi?->nilai_akhir ?? '-')
            ->description($nilaiTertinggi?->mapelMaster?->nama_mapel ?? '-')
            ->icon('heroicon-o-arrow-trending-up'),

        Card::make(
            'Nilai Terendah', $nilaiTerendah?->nilai_akhir ?? '-')
            ->description($nilaiTerendah?->mapelMaster?->nama_mapel ?? '-')
            ->icon('heroicon-o-arrow-trending-down'),
        Stat::make('Kelas', $siswaKelasAktif?->kelas?->nama_kelas ?? '-')
            ->icon('heroicon-o-building-library')
            ->description('Kelas saat ini'),    
        Stat::make('Tahun Ajaran', $tahunajaranAktif?->nama_tahun ?? '-')
            ->icon('heroicon-o-calendar')
            ->description('Tahun Ajaran saat ini'),  
    ];
}

        return [];
        
    }

    public static function canView(): bool
    {
        return Auth::user()?->hasAnyRole(['guru', 'siswa']);
    }
}
