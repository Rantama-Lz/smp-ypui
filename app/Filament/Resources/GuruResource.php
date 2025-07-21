<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use App\Models\Guru;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GuruResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GuruResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use App\Filament\Resources\GuruResource\RelationManagers\GuruMapelRelationManager;

class GuruResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Guru::class;  
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Data Guru';
    protected static ?string $label = 'Data Guru';
    protected static ?string $navigationGroup = 'Manajemen Pengguna';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->hiddenOn('edit')
                ->dehydrated(fn($state) => filled($state)),
                TextInput::make('nama')
                ->required()
                ->placeholder('Nama Lengkap')
                ->formatStateUsing(fn($state): string => str()->headline($state))
                ->label('Nama'),
                TextInput::make('nip')
                ->helperText('NIP terdiri dari 18 digit angka.')
                ->maxLength(18)
                ->inputMode('numeric')
                
                ->label('Nomor Induk Pegawai'),
                Select::make('jenis_kelamin')
                ->placeholder('Pilih Jenis Kelamin')
                ->label('Jenis Kelamin')
                ->required()
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ]),
                DatePicker::make('tgl_lahir')
                ->required()
                ->label('Tanggal Lahir'),
                Textarea::make('alamat')
                ->helperText('Contoh : Jl. Praja Lapangan No.8, RT.04/RW.01, Kebayoran Lama Selatan, Kebayoran Lama, Jakarta Selatan.')
                ->required(),
                FileUpload::make('foto')
                ->label('Foto Profil')
                ->image()
                ->maxSize(2048) 
                ->directory('guru'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->sortable()
                ->searchable()
                ->formatStateUsing(fn($state): string => str()->headline($state))
                ->label('Nama Lengkap'),
                TextColumn::make('nip')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: false)
                ->label('Nomor Induk Pegawai'),
                TextColumn::make('mapels.nama_mapel')
                ->sortable()
                ->words(5)
                ->label('Mengampu Mata Pelajaran'),
                TextColumn::make('jenis_kelamin')
                ->sortable()
                ->label('Jenis Kelamin'),
                TextColumn::make('tgl_lahir')
                ->toggleable(isToggledHiddenByDefault: false)
                ->label('Tanggal Lahir'),
                TextColumn::make('alamat')
                ->limit('30')
                ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('foto')
                ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Dibuat pada')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Diperbarui pada')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->defaultSort('nama', 'asc')
            ->paginated([10, 25, 50, 100])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            GuruMapelRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
        ];
    }
}
