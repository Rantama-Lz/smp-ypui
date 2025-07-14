<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Nilai;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NilaiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NilaiResource\RelationManagers;
use PhpParser\Node\Stmt\Label;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;
    protected static ?string $navigationGroup = 'Manajemen Akademik';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('siswa_kelas_id')
                ->searchable()
                ->preload()
                ->required()
                ->label('Nama Siswa')
                ->placeholder('Nama Siswa - NIS - Kelas')
                ->relationship('siswaKelas','id')
                ->options(function () {
                return \App\Models\SiswaKelas::with(['siswa', 'kelas'])
                    ->get()
                    ->sortBy(fn ($record) => $record->siswa->nama)
                    ->mapWithKeys(function ($record) {
                        return [
                            $record->id => $record->siswa->nama . ' - ' . $record->siswa->nis . ' - ' . $record->kelas->nama_kelas
                        ];
                    });
                })
                // ->getOptionLabelFromRecordUsing(fn ($record) =>
                //     $record->siswa->nama . ' - '. $record->siswa->nis .' - ' . $record->kelas->nama_kelas
                // )
                ->reactive()
                ->afterStateUpdated(function ($state, $set) {
                $siswaKelas = \App\Models\SiswaKelas::find($state);
                if ($siswaKelas) {
                    $set('tahun_ajaran_id', $siswaKelas->tahun_ajaran_id);
                    }
                })
                ->afterStateUpdated(function ($state, callable $set) {
                    $siswa = \App\Models\Siswa::find($state);
                    $set('nis', $siswa?->nis);
                }),
                
                Select::make('mata_pelajaran_id')
                ->required()
                ->placeholder('Pilih Mata Pelajaran')
                ->label('Mata Pelajaran')
                ->relationship('mapel.master','nama_mapel'),
                Select::make('tahun_ajaran_id')
                ->relationship('SiswaKelas.tahunajaran', 'nama_tahun')
                ->disabled()
                ->label('Tahun Ajaran'),
                Select::make('semester')
                ->placeholder('Pilih Semester')
                ->required()
                ->label('Semester')
                ->options([
                    'Ganjil' => 'Ganjil',
                    'Genap' => 'Genap',
                ]),
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
                ->minValue('10')
                ->numeric(),
                // TextInput::make('nilai_akhir')
                // ->maxValue('100')
                // ->live()
                // ->readonly(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswaKelas.siswa.nama')
                ->label('Nama Siswa')
                ->sortable(),
                TextColumn::make('siswaKelas.siswa.nis')
                ->label('NIS')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('siswaKelas.kelas.nama_kelas')
                ->label('Kelas')
                ->sortable(),
                TextColumn::make('mapel.master.nama_mapel')
                ->label('Mata Pelajaran')
                ->sortable(),
                TextColumn::make('siswaKelas.tahunajaran.nama_tahun')
                ->label('Tahun Ajaran')
                ->sortable(),
                TextColumn::make('semester')
                ->searchable(),
                TextColumn::make('nilai_harian')
                ->label('Nilai Harian')
                ->numeric()
                ->sortable(),
                TextColumn::make('nilai_uts')
                ->label('Nilai UTS')
                ->numeric()
                ->sortable(),
                TextColumn::make('nilai_uas')
                ->label('Nilai UAS')
                ->numeric()
                ->sortable(),
                TextColumn::make('nilai_akhir')
                ->label('Nilai Akhir')
                ->numeric()
                ->sortable(),
                TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
