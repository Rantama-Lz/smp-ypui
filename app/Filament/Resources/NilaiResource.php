<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Nilai;
use App\Models\User;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use PhpParser\Node\Stmt\Label;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NilaiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NilaiResource\Pages\InputNilai;
use App\Filament\Resources\NilaiResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Facades\Filament;

class NilaiResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Nilai::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    public static function getNavigationSort(): ?int
{
    if (auth()->check() && auth()->user()->hasRole('siswa')) {
        return 1;
    }
    return 4;
}
    public static function getNavigationGroup(): ?string
{
    if (auth()->check()) {
        if (auth()->user()->hasRole('siswa') || auth()->user()->hasRole('guru')) {
            return 'Akademik';
        }
    }

    return 'Manajemen Akademik';
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('siswa_kelas_id')
                ->searchable()
                ->columnSpan(2)
                ->preload()
                ->required()
                ->label('Nama Siswa')
                ->placeholder('Nama Siswa - NIS - Kelas - Tahun Ajaran')
                ->options(function () {
                return \App\Models\SiswaKelas::with(['siswa', 'kelas'])
                    ->get()
                    ->sortBy(fn ($record) => $record->siswa->nama)
                    ->mapWithKeys(function ($record) {
                        return [
                            $record->id => $record->siswa->nama . ' - ' . $record->siswa->nis . ' - ' . $record->kelas->nama_kelas . ' - ' . $record->tahunajaran->nama_tahun
                        ];
                    });
                })
                ->reactive(),
                Select::make('mapel_master_id')
                ->required()
                ->placeholder('Pilih Mata Pelajaran')
                ->label('Mata Pelajaran')
                ->relationship('mapelmaster','nama_mapel'),
                
                Select::make('semester')
                ->placeholder('Pilih Semester')
                ->required()
                ->label('Semester')
                ->options([
                    'Ganjil' => 'Ganjil',
                    'Genap' => 'Genap',
                ]),
                Grid::make(3)
                ->schema([
                TextInput::make('nilai_harian')
                ->label('Nilai Harian')
                ->maxValue('100')
                ->minValue('10')
                ->numeric(),
                TextInput::make('nilai_uts')
                ->label('Nilai Ujian Tengah Semester')
                ->maxValue('100')
                ->minValue('10')
                ->numeric(),
                TextInput::make('nilai_uas')
                ->label('Nilai Ujian Akhir Semester')
                ->maxValue('100')
                ->minValue('0')
                ->numeric(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswaKelas.siswa.nama')
                ->label('Nama Siswa')
                ->sortable()
                ->searchable(),
                TextColumn::make('siswaKelas.siswa.nis')
                ->label('NIS')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('siswaKelas.kelas.nama_kelas')
                ->searchable()
                ->sortable()
                ->label('Kelas'),
                TextColumn::make('siswaKelas.tahunajaran.nama_tahun')
                ->label('Tahun Ajaran')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('mapelmaster.nama_mapel')
                ->searchable()
                ->sortable()
                ->label('Mata Pelajaran'),
                TextColumn::make('semester')
                ->searchable()
                ->sortable(),
                TextColumn::make('nilai_harian')
                ->label('Nilai Harian')
                ->numeric(),
                TextColumn::make('nilai_uts')
                ->label('Nilai UTS')
                ->numeric(),
                TextColumn::make('nilai_uas')
                ->label('Nilai UAS')
                ->numeric(),
                TextColumn::make('nilai_akhir')
                ->label('Nilai Akhir')
                ->numeric(),
                TextColumn::make('created_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at' , 'desc')
            ->filters([
                SelectFilter::make('siswa_kelas_id')
                ->label('Kelas')
                ->relationship('siswaKelas.kelas.tingkatkelas', 'kelas'),
                SelectFilter::make('tahun_ajaran_id')
                ->label('Tahun Ajaran')
                ->relationship('siswaKelas.tahunajaran', 'nama_tahun'),
                SelectFilter::make('mata_pelajaran_id')
                ->label('Mata Pelajaran')
                ->relationship('mapelmaster', 'nama_mapel'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNilais::route('/'),
            // 'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
            'create' => InputNilai::route('/create')
        ];
    }


    public static function getEloquentQuery(): Builder
{
    $user = auth()->user();

    if ($user->hasRole(['admin', 'super_admin'])) {
        return parent::getEloquentQuery();
    }

    if ($user->hasRole('guru')) {
        $guru = $user->guru;

        if (!$guru) return parent::getEloquentQuery()->whereRaw('0 = 1');

        $mapelIds = $guru->mapels->pluck('id')->toArray();

        return parent::getEloquentQuery()
            ->whereIn('mapel_master_id', $mapelIds)
            ->whereHas('siswaKelas.siswa', function ($query) {
                $query->where('status', 'aktif'); 
            });
    }

    if ($user->hasRole('siswa')) {
        $siswaId = $user->siswa?->id;

        return parent::getEloquentQuery()
            ->whereHas('siswaKelas', function ($query) use ($siswaId) {
                $query->where('siswa_id', $siswaId);
            });
    }
    return parent::getEloquentQuery()->whereRaw('0 = 1');
}

public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }

}
