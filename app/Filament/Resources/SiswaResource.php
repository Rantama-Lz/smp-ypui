<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class SiswaResource extends Resource implements HasShieldPermissions
{
    protected static ?int $navigationSort = 3;
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $label = 'Data Siswa';
    protected static ?string $navigationGroup = 'Manajemen Pengguna';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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
                ->placeholder('Nama Lengkap')
                ->label('Nama')
                ->required()
                ->formatStateUsing(fn($state): string => str()->headline($state)),
                DatePicker::make('tgl_lahir')
                ->required()
                ->label('Tanggal Lahir'),
                TextInput::make('nis')
                ->maxLength(10)
                ->minLength(10)
                ->hiddenOn('create')
                ->readOnly()
                ->label('Nomor Induk Siswa'),
                Select::make('jenis_kelamin')
                ->placeholder('Pilih Jenis Kelamin')
                ->required()
                ->label('Jenis Kelamin')
                ->preload()
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                    ]),
                Textarea::make('alamat')
                ->helperText('Contoh : Jl. Praja Lapangan No.8, RT.04/RW.01, Kebayoran Lama Selatan, Kebayoran Lama, Jakarta Selatan.')
                ->required(),
                FileUpload::make('foto')
                ->label('Foto Profil')
                ->image()
                ->maxSize(2048) 
                ->directory('siswa'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Nama Lengkap')
                ->formatStateUsing(fn($state): string => str()->headline($state))
                ->sortable()
                ->searchable(),
                TextColumn::make('nis')
                ->toggleable(isToggledHiddenByDefault: false)
                ->searchable()
                ->label('Nomor Induk Siswa'),
                TextColumn::make('jenis_kelamin')
                ->sortable()
                ->label('Jenis Kelamin'),
                TextColumn::make('tgl_lahir')
                ->toggleable(isToggledHiddenByDefault: false)
                ->label('Tanggal Lahir'),
                TextColumn::make('alamat')
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
            ])
            ->defaultSort('nama', 'asc')
            ->paginated([10, 25, 50, 100])
            ->bulkActions([
                
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
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
            'delete_any',
        ];
    }
   
}
