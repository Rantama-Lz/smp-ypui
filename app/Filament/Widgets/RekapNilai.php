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
        Card::make("Kamu Guru Mata Pelajaran", "")
            ->description($namaMapel ?: '-')
            ->icon('heroicon-o-book-open'),
        Stat::make('Tahun Ajaran Aktif', $tahunajaranAktif?->nama_tahun ?? '-')
            ->icon('heroicon-s-calendar'),
    ];
}

        if ($user->hasRole('siswa')) {
    $siswaId = $user->siswa?->id;
    $tahunajaranAktif = TahunAjaran::where('active', true)->first();

    // Ambil nilai tertinggi
    $nilaiTertinggi = Nilai::whereHas('siswaKelas', function ($query) use ($siswaId) {
            $query->where('siswa_id', $siswaId);
        })
        ->with('mapelMaster')
        ->orderByDesc('nilai_akhir')
        ->first();

    // Ambil nilai terendah
    $nilaiTerendah = Nilai::whereHas('siswaKelas', function ($query) use ($siswaId) {
            $query->where('siswa_id', $siswaId);
        })
        ->with('mapelMaster')
        ->orderBy('nilai_akhir')
        ->first();

    return [
        Card::make(
            'Nilai Tertinggi',$nilaiTertinggi?->nilai_akhir ?? '-')
            ->description(($nilaiTertinggi?->mapelMaster?->nama_mapel ?? '-'))
            ->icon('heroicon-o-arrow-trending-up'),

        Card::make(
            'Nilai Terendah',$nilaiTerendah?->nilai_akhir ?? '-')
            ->description(($nilaiTerendah?->mapelMaster?->nama_mapel ?? '-'))
            ->icon('heroicon-o-arrow-trending-down'),

        Stat::make('Tahun Ajaran Aktif', $tahunajaranAktif?->nama_tahun ?? '-')
            ->icon('heroicon-o-calendar'),
    ];
}

        // Kalau admin / lainnya kosongin
        return [];
        
    }

    public static function canView(): bool
    {
        return Auth::user()?->hasAnyRole(['guru', 'siswa']);
    }
}
