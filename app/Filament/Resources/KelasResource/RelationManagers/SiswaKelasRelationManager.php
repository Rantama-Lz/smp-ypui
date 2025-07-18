<?php

namespace App\Filament\Resources\KelasResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kelas;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TahunAjaran;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SiswaKelasRelationManager extends RelationManager
{
    protected static string $relationship = 'siswaKelas';
    public static function beforeCreate($record): void
            {
                static::checkDuplicate($record);
            }

    public static function beforeUpdate($record): void
            {
                static::checkDuplicate($record, $record->id);
            }
    protected static function checkDuplicate($record, $ignoreId = null): void
    {
    $exists = \App\Models\SiswaKelas::where('siswa_id', $record->siswa_id)
        ->where('tahun_ajaran_id', $record->tahun_ajaran_id)
        ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
        ->exists();
    if ($exists) {
        // Tampilkan notifikasi tanpa melempar exception
        Notification::make()
            ->title('Gagal Simpan')
            ->body('Siswa sudah terdaftar di tahun ajaran ini.')
            ->danger()
            ->send();

        // Hentikan proses penyimpanan
        abort(409, 'Siswa sudah terdaftar di tahun ajaran ini.');
        }
    }
     public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('siswa_id')
                ->label('Siswa')
                ->options(Siswa::all()->pluck('nama', 'id'))
                ->searchable()
                ->required(),
                
            Forms\Components\Select::make('tahun_ajaran_id')
                ->label('Tahun Ajaran')
                ->options(TahunAjaran::all()->pluck('nama_tahun', 'id'))
                ->required(),
        ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->heading('Siswa di Kelas ini')
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                ->label('Nama'),
                Tables\Columns\TextColumn::make('tahunajaran.nama_tahun')
                ->label('Tahun Ajaran'),
            ])
            
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public function isReadOnly(): bool
{
    return true;
}
}
