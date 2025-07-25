<?php

namespace App\Filament\Resources;

use App\Models\Spp;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SppResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SppResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class SppResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Spp::class;
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'SPP';
    protected static ?string $heading = 'SPP';
    protected static ?string $navigationGroup = 'Manajemen Keuangan';
    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tahun_ajaran_id')
                ->required()
                ->placeholder('Pilih Tahun Ajaran')
                ->label('Tahun Ajaran')
                ->relationship('tahunajaran','nama_tahun'),
                Select::make('bulan')
                ->placeholder('Pilih Bulan')
                ->label('Bulan')
                ->required()
                ->options([
                    'Januari' => 'Januari',
                    'Februari' => 'Februari',
                    'Maret' => 'Maret',
                    'April' => 'April',
                    'Mei' => 'Mei',
                    'Juni' => 'Juni',
                    'Juli' => 'Juli',
                    'Agustus' => 'Agustus',
                    'September' => 'September',
                    'Oktober' => 'Oktober',
                    'November' => 'November',
                    'Desember' => 'Desember'
                ]),
                TextInput::make('nominal')
                    ->label('Nominal')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahunajaran.nama_tahun')
                ->label('Tahun Ajaran')
                ->sortable(),
                TextColumn::make('bulan')
                ->searchable()
                ->sortable(),
                TextColumn::make('nominal')
                ->label('Nominal')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
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
                SelectFilter::make('tahun_ajaran_id')
                    ->relationship('tahunajaran', 'nama_tahun')
                    ->label('Tahun Ajaran'),
                SelectFilter::make('bulan')
                ->options([
                    'Januari' => 'Januari',
                    'Februari' => 'Februari',
                    'Maret' => 'Maret',
                    'April' => 'April',
                    'Mei' => 'Mei',
                    'Juni' => 'Juni',
                    'Juli' => 'Juli',
                    'Agustus' => 'Agustus',
                    'September' => 'September',
                    'Oktober' => 'Oktober',
                    'November' => 'November',
                    'Desember' => 'Desember'
                    ])
                ->label('Bulan')
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
            'index' => Pages\ListSpps::route('/'),
            'create' => Pages\CreateSpp::route('/create'),
            'edit' => Pages\EditSpp::route('/{record}/edit'),
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
