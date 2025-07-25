<?php

namespace App\Filament\Resources\SiswaKelasResource\Pages;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use App\Models\TahunAjaran;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Actions\Action;
use App\Filament\Resources\SiswaKelasResource;
use Filament\Forms\Concerns\InteractsWithForms;

class NaikKelas extends Page implements HasForms

{
    use InteractsWithForms;
    protected static string $resource = SiswaKelasResource::class;

    protected static string $view = 'filament.resources.siswa-kelas-resource.pages.naik-kelas';
    protected static ?string $title = 'Naik Kelas';

    public $kelas_asal_id;
    public $tahun_asal_id;
    public $kelas_tujuan_id;
    public $tahun_tujuan_id;
    public $siswa_ids = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
         Grid::make(2)
            ->schema([
                Select::make('kelas_asal_id')
                    ->label('Kelas Asal')
                    ->placeholder('Pilih Kelas Asal')
                    ->options(Kelas::pluck('nama_kelas', 'id'))
                    ->reactive()
                    ->required(),

                Select::make('tahun_asal_id')
                    ->label('Tahun Ajaran Asal')
                    ->placeholder('Pilih Tahun Ajaran Asal')
                    ->options(TahunAjaran::pluck('nama_tahun', 'id'))
                    ->reactive()
                    ->required(),

                Select::make('siswa_ids')
                    ->label('Nama Siswa')
                    ->placeholder('Pilih Siswa')
                    ->columnSpan(2)
                    ->hint('Pilih Kelas Asal & Tahun Ajaran Asal terlebih dahulu.')
                    ->helperText('Dapat memilih banyak Siswa sekaligus.')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->options(function (callable $get) {
                        $kelasId = $get('kelas_asal_id');
                        $tahunId = $get('tahun_asal_id');

                        if (! $kelasId || ! $tahunId) {
                            return [];
                        }

                        return \App\Models\SiswaKelas::with('siswa')
                            ->where('kelas_id', $kelasId)
                            ->where('tahun_ajaran_id', $tahunId)
                            ->where('status', 'Aktif')
                            ->get()
                            ->mapWithKeys(fn ($sk) => [$sk->siswa_id => $sk->siswa->nama]);
                    })
                    ->required(),

                Select::make('kelas_tujuan_id')
                    ->label('Kelas Tujuan')
                    ->placeholder('Pilih Kelas Tujuan')
                    ->hint('Pilih Kelas Asal terlebih dahulu.')
                    ->options(function (callable $get) {
                        $kelas_asal_id = $get('kelas_asal_id');
                        $kelasAsal = Kelas::find($kelas_asal_id);

                        if (! $kelasAsal) {
                            return [];
                        }

                        // Hanya kelas dengan tingkat lebih tinggi dari asal (naik kelas)
                        return Kelas::where('tingkat_kelas_id', '>', $kelasAsal->tingkat_kelas_id)
                            ->orderBy('tingkat_kelas_id')
                            ->pluck('nama_kelas', 'id');
                    })
                    ->reactive()
                    ->required(),

                Select::make('tahun_tujuan_id')
                    ->label('Tahun Ajaran Tujuan')
                    ->placeholder('Pilih Tahun Ajaran Tujuan')
                    ->hint('Pilih Tahun Ajaran Asal terlebih dahulu.')
                    ->options(function (callable $get) {
                        $tahunAsal = \App\Models\TahunAjaran::find($get('tahun_asal_id'));

                        if (! $tahunAsal) {
                            return [];
                        }

                        return \App\Models\TahunAjaran::where('id', '>', $tahunAsal->id) // atau sesuaikan dengan field urutan waktu
                            ->orderBy('id') // atau order by tahun_mulai jika ada
                            ->pluck('nama_tahun', 'id');
                    })
                    ->reactive()
                    ->required(),
            ])
        
    ];
    }

    public function naikkanKelas()
    {
        $kelasAsal = Kelas::find($this->kelas_asal_id);
        $kelasTujuan = Kelas::find($this->kelas_tujuan_id);

        if ($kelasTujuan->tingkatkelas <= $kelasAsal->tingkatkelas) {
            Notification::make()
                ->title('Validasi Gagal')
                ->body('Kelas tujuan harus lebih tinggi dari kelas asal.')
                ->danger()
                ->send();
            return;
        }

        $siswaNaik = [];

        foreach ($this->siswa_ids as $siswaId) {
            SiswaKelas::where('siswa_id', $siswaId)
                ->where('tahun_ajaran_id', $this->tahun_asal_id)
                ->update(['status' => 'Tidak Aktif']);

            SiswaKelas::updateOrCreate([
                'siswa_id' => $siswaId,
                'tahun_ajaran_id' => $this->tahun_tujuan_id,
            ], [
                'kelas_id' => $this->kelas_tujuan_id,
                'status' => 'Aktif',
            ]);

            $siswaNaik[] = Siswa::find($siswaId)->nama;
        }

        $tahunTujuan = TahunAjaran::find($this->tahun_tujuan_id);

        Notification::make()
            ->title('Kenaikan Kelas Berhasil')
            ->body(count($siswaNaik) . ' siswa dinaikkan ke Kelas '. 
                   $kelasTujuan->nama_kelas)
            ->success()
            ->send();

        $this->redirect(\App\Filament\Resources\SiswaKelasResource::getUrl());
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label('Naikkan Kelas')
                ->action('naikkanKelas'),
        ];
    }

    public static function canAccess(array $parameters = []): bool
{
    return !auth()->user()?->hasRole('guru');
}
}
