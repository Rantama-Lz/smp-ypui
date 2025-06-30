<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\RelationManagers;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationGroup = 'Manajemen Data Pengguna';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->label('Nama Lengkap')
                ->required()
                ->formatStateUsing(fn($state): string => str()->headline($state)),
                TextInput::make('nis')
                ->required()
                ->label('Nomor Induk Siswa'),
                    // ->disabled(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\EditRecord), untuk disable edit
                Select::make('jenis_kelamin')
                ->required()
                ->label('Jenis Kelamin')
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                    ]),
                DatePicker::make('tgl_lahir')
                ->required()
                ->label('Tanggal Lahir'),
                Textarea::make('alamat')
                ->required(),
                FileUpload::make('foto')
                ->directory('siswa'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->state(
                static function (HasTable $livewire, stdClass $rowLoop): string {
                return (string) (
                $rowLoop->iteration +
                ($livewire->getTableRecordsPerPage() * (
                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
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
}
