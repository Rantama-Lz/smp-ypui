<?php

namespace App\Filament\Resources\NilaiResource\Pages;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\SiswaKelas;
use App\Models\MapelMaster;
use App\Models\TahunAjaran;
use Filament\Forms\Form;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use App\Filament\Resources\NilaiResource;
use Filament\Forms\Concerns\InteractsWithForms;

class InputNilai extends Page implements HasForms
{
    use InteractsWithForms;
    protected static string $resource = NilaiResource::class;
    protected static ?string $title = 'Input Nilai';
    protected static string $view = 'filament.resources.nilai-resource.pages.input-nilai';
    
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
        Grid::make(2)
        ->schema([
        Select::make('tahun_ajaran_id')
            ->label('Tahun Ajaran')
            ->options(TahunAjaran::all()->pluck('nama_tahun', 'id'))
            ->reactive()
            ->required(),

        Select::make('kelas_id')
            ->label('Kelas')
            ->options(Kelas::all()->pluck('nama_kelas', 'id'))
            ->reactive()
            ->required(),

        Select::make('siswa_kelas_id')
            ->label('Nama Siswa')
            ->columnSpan(2)
            ->options(function (callable $get) {
                $kelasId = $get('kelas_id');
                $tahunAjaranId = $get('tahun_ajaran_id');

                if (! $kelasId || ! $tahunAjaranId) {
                    return [];
                }

                return SiswaKelas::with('siswa')
                    ->where('kelas_id', $kelasId)
                    ->where('tahun_ajaran_id', $tahunAjaranId)
                    ->where('status', 'Aktif')
                    ->get()
                    ->pluck('siswa.nama', 'id');
            })
            ->searchable()
            ->required()
            ->disabled(fn (callable $get) => ! $get('kelas_id') || ! $get('tahun_ajaran_id'))
            ->hint('Pilih Kelas & Tahun Ajaran terlebih dahulu')
            ->reactive(),

            Select::make('mapel_master_id')
                ->label('Mata Pelajaran')
                ->options(MapelMaster::all()->pluck('nama_mapel', 'id'))
                ->searchable()
                ->required(),

            Select::make('semester')
                ->label('Semester')
                ->options([
                    'Ganjil' => 'Ganjil',
                    'Genap' => 'Genap',
                ])
                ->required(),
                ]),

            Grid::make(3)->schema([
                TextInput::make('nilai_harian')
                    ->label('Nilai Harian')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                TextInput::make('nilai_uts')
                    ->label('Nilai UTS')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),

                TextInput::make('nilai_uas')
                    ->label('Nilai UAS')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
            ]),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->statePath('data');
    }

    public function submit()
    {
        $state = $this->form->getState();

        $sudahAda = \App\Models\Nilai::where('siswa_kelas_id', $state['siswa_kelas_id'])
        ->where('mapel_master_id', $state['mapel_master_id'])
        ->where('semester', $state['semester'])
        ->exists();

    if ($sudahAda) {
        \Filament\Notifications\Notification::make()
            ->title('Nilai sudah pernah diinput!')
            ->body('Nilai untuk siswa ini di mapel & semester yang sama sudah ada.')
            ->danger()
            ->persistent()
            ->send();

        return;
    }
        // Hitung nilai akhir
        $nilai_akhir = round(
            ($state['nilai_harian'] * 0.3) +
            ($state['nilai_uts'] * 0.3) +
            ($state['nilai_uas'] * 0.4)
        );

        Nilai::create([
        'siswa_kelas_id' => $state['siswa_kelas_id'],
        'mapel_master_id' => $state['mapel_master_id'],
        'semester' => $state['semester'],
        'nilai_harian' => $state['nilai_harian'],
        'nilai_uts' => $state['nilai_uts'],
        'nilai_uas' => $state['nilai_uas'],
        'nilai_akhir' => $nilai_akhir,
    ]);
        Notification::make()
            ->title('Nilai berhasil disimpan!')
            ->success()
            ->send();

         $newState = $this->form->getState();

    $this->form->fill([
        ...$newState,
        'siswa_kelas_id' => null,
        'nilai_harian' => null,
        'nilai_uts' => null,
        'nilai_uas' => null,
    ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label('Simpan Nilai')
                ->submit('submit')
                ->color('primary'),
        ];
    }
}

