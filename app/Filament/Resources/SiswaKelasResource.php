<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\SiswaKelas;
use Filament\Tables\Table;
use Illuminate\Validation\Rule;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Unique;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaKelasResource\Pages;
use App\Filament\Resources\SiswaKelasResource\Pages\NaikKelas;
use App\Filament\Resources\SiswaKelasResource\RelationManagers;

class SiswaKelasResource extends Resource
{
    protected static ?string $model = SiswaKelas::class;
    protected static ?string $navigationLabel = 'Siswa';
    protected static ?string $label = 'Siswa';
    protected static ?string $navigationGroup = 'Manajemen Akademik';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
       
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->label('Nama Siswa')
                    ->relationship('siswa', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'nama_kelas')
                    ->required(),
                Select::make('status')
                    ->label('Status Siswa')
                    ->options([
                    'Aktif' => 'Aktif',
                    'Tidak Aktif' => 'Tidak Aktif',
                    'Lulus' => 'Lulus'
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                ->label('Nama')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('kelas.nama_kelas')
                ->label('Kelas')
                ->sortable(),
                Tables\Columns\TextColumn::make('tahunajaran.nama_tahun')
                ->label('Tahun Ajaran')
                ->sortable(),
                BadgeColumn::make('status')
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'Aktif' => 'Aktif',
                    'Tidak Aktif' => 'Tidak Aktif',
                    'Lulus' => 'Lulus',
                    
                    default => ucfirst($state),
                })
                ->color(fn (string $state): string => match ($state) {
                    'Aktif' => 'success',
                    'Tidak Aktif' => 'gray',
                    'Lulus' => 'primary',
                    
                    default => 'gray',
                }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Dibuat pada')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Diperbarui pada')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->defaultSort('siswa.nama', 'asc')
            ->filters([
                SelectFilter::make('tahun_ajaran_id')
                ->relationship('tahunajaran', 'nama_tahun')
                ->label('Tahun Ajaran'),
                SelectFilter::make('siswa_kelas_id')
                ->label('Kelas')
                ->relationship('kelas', 'nama_kelas'),
                SelectFilter::make('siswa_tingkat_kelas_id')
                ->label('Tingkat Kelas')
                ->relationship('kelas.tingkatkelas', 'kelas'),
                SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'Aktif' => 'Aktif',
                    'Tidak Aktif' => 'Tidak Aktif',
                    'Lulus' => 'Lulus'
                    ])
            ])
            ->bulkActions([
           BulkAction::make('luluskan')
                ->label('Luluskan Siswa')
                ->icon('heroicon-o-academic-cap')
                ->requiresConfirmation()
                ->color('primary')
                ->action(function (Collection $records) {
                    $updatedCount = 0;

                    foreach ($records as $record) {
                        if ($record->status === 'Aktif') {
                            $record->update([
                                'status' => 'Lulus', // Sesuaikan dengan enum kamu
                            ]);
                            $updatedCount++;
                        }
                    }

                    Notification::make()
                        ->title("{$updatedCount} siswa berhasil diluluskan")
                        ->success()
                        ->send();
                })
                ->deselectRecordsAfterCompletion(),
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSiswaKelas::route('/'),
            'create' => Pages\CreateSiswaKelas::route('/create'),
            'edit' => Pages\EditSiswaKelas::route('/{record}/edit'),
            'buat' => Pages\BuatBanyakSiswaKelas::route('/buat'),
            'naik-kelas' => NaikKelas::route('/naik-kelas'),
        ];
    }
}
