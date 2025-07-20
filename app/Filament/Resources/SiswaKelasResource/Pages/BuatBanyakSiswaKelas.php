<?php

namespace App\Filament\Resources\SiswaKelasResource\Pages;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Actions\Action;
use App\Filament\Resources\SiswaKelasResource;
use Filament\Forms\Concerns\InteractsWithForms;

class BuatBanyakSiswaKelas extends Page implements HasForms

{
    use InteractsWithForms;
    protected static string $resource = SiswaKelasResource::class;
    
    protected ?string $heading = 'Menabahkan Siswa ke Kelas';
    protected static ?string $title = 'Buat';
    protected static string $view = 'filament.resources.siswa-kelas-resource.pages.buat-banyak-siswa-kelas';
    
    public $kelas_id;
    public $tahun_ajaran_id;
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

                Select::make('siswa_ids')
                    ->label('Nama Siswa')
                    ->placeholder('Cari Siswa')
                    ->preload()
                    ->options(\App\Models\Siswa::pluck('nama', 'id'))
                    ->multiple()
                    ->hint('Harap memilih dengan teliti.')
                    ->helperText('Dapat memilih banyak Siswa sekaligus.')
                    ->searchable()
                    ->required(),

                Select::make('tahun_ajaran_id')
                    ->label('Tahun Ajaran')
                    ->placeholder('Pilih Tahun Ajaran')
                    ->hint('Hanya menampilkan Tahun Ajaran yang Aktif')
                    ->options(\App\Models\TahunAjaran::where('active', true)->pluck('nama_tahun', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('kelas_id')
                    ->label('Kelas')
                    ->placeholder('Pilih Kelas')          
                    ->options(\App\Models\Kelas::all()->pluck('nama_kelas', 'id'))
                    ->searchable()
                    ->required(),

               
        
            ])
        ];
    }

    public function createSiswaKelas()
    {
         if (empty($this->siswa_ids) || empty($this->kelas_id) || empty($this->tahun_ajaran_id)) {
        Notification::make()
            ->title('Isi Nama / Kelas / Tahun Ajaran terlebih dahulu.')
            ->danger()
            ->send();

        return;
    }
    $kelas = Kelas::find($this->kelas_id);
    $siswaYangSudahAda = [];
    $siswaYangDitambahkan = [];

    foreach ($this->siswa_ids as $siswaId) {
        $sudahAda = SiswaKelas::where('siswa_id', $siswaId)
            ->where('tahun_ajaran_id', $this->tahun_ajaran_id)
            ->exists();

        $siswa = \App\Models\Siswa::find($siswaId);
        $namaSiswa = $siswa->nama ?? 'Siswa ID ' . $siswaId;

        if ($sudahAda) {
            $siswaYangSudahAda[] = $namaSiswa;
            continue;
        }

        SiswaKelas::create([
            'siswa_id' => $siswaId,
            'kelas_id' => $this->kelas_id,
            'tahun_ajaran_id' => $this->tahun_ajaran_id,
        ]);

        $siswaYangDitambahkan[] = $namaSiswa;
    }

    
    if (empty($siswaYangDitambahkan)) {
        Notification::make()
            ->title('Tidak ada siswa yang ditambahkan.')
            ->body('Semua siswa yang dipilih sudah memiliki kelas di tahun ajaran ini.')
            ->danger()
            ->send();

        return;
    }

    
    if (!empty($siswaYangSudahAda)) {
        Notification::make()
            ->title(count($siswaYangSudahAda) . ' siswa sudah memiliki kelas.')
            ->body(implode(', ', $siswaYangSudahAda))
            ->danger()
            ->send();
    }

    
    Notification::make()
        ->title(count($siswaYangDitambahkan) . ' siswa berhasil ditambahkan ke kelas '. $kelas->nama_kelas)
        ->body(implode(', ', $siswaYangDitambahkan))
        ->success()
        ->send();

    $this->redirect(SiswaKelasResource::getUrl());
    
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label('Buat')
                ->action('createSiswaKelas'),
        ];
    }

}
