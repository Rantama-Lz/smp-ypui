<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pembayaran;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;
use Filament\Forms\Components\Hidden;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;
    protected static ?string $navigationGroup = 'Manajemen Keuangan';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tagihan_id')
                ->placeholder('Nama Siswa - Bulan - Nominal')
                ->label('Tagihan')
                ->options(function () {
                    return \App\Models\Tagihan::with(['siswaKelas', 'spp'])->get()->mapWithKeys(function ($tagihan) {
                        return [
                            $tagihan->id => $tagihan->siswa->nama . ' - ' .
                                $tagihan->spp->bulan . ' - Rp ' .
                                number_format($tagihan->spp->nominal, 0, ',', '.'),
                        ];
                    });
                })
                ->searchable(['siswaKelas.nama'])
                ->preload()
                ->required(),
                DatePicker::make('tanggal_bayar')
                ->label('Tanggal Pembayaran')
                ->required(),
                TextInput::make('jumlah_bayar')
                ->label('Nominal Pembayaran')
                ->placeholder('250000')
                ->numeric()
                ->required()
                ->maxLength(255),
                 Select::make('metode_bayar')
                 ->placeholder('Pilih Metode Pembayaran')
                ->label('Metode Pembayaran')
                ->required()
                ->options([
                    'Tunai' => 'Tunai',
                    'Transfer' => 'Transfer'
                ]),
                FileUpload::make('buktibayar')
                    ->label('Bukti Pembayaran')
                    ->image()
                    ->directory('buktibayar')
                    ->required(),
                Select::make('status')
                ->label('Status Pembayaran')
                ->options([
                    'Menunggu Validasi' => 'Menunggu Validasi',
                    'Sudah Validasi' => 'Sudah Validasi',
                    'Ditolak' => 'Ditolak'
                ])
                ->default('Menunggu Validasi')
                ->disabled(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                ->required(),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tagihan.siswaKelas.nama')
                ->label('Nama Siswa')
                ->searchable()
                ->sortable(),
                TextColumn::make('tagihan.siswaKelas.nis')
                ->label('NIS')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tagihan.spp.bulan')
                ->label('Bulan'),
                TextColumn::make('tagihan.spp.nominal')->label('Nominal')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('tanggal_bayar')
                ->date()
                ->label('Tanggal'),
                TextColumn::make('metode_bayar')
                ->label('Metode Pembayaran'),
                ImageColumn::make('buktibayar')
                ->label('Bukti Pembayaran')
                ->width(80),
                BadgeColumn::make('status')->colors([
                    'warning' => 'Menunggu Validasi',
                    'success' => 'Sudah Validasi',
                    'danger' => 'Ditolak',
                ]),
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
                Tables\Actions\Action::make('validasi')
                    ->label('Validasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'Menunggu Validasi')
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'Sudah Validasi',
                            // 'validated_by' => auth()->id(),
                            // 'validated_at' => now(),
                        ]);
                        $record->tagihan->update(['status' => 'Sudah Bayar']);

                        Notification::make()
                            ->title('Pembayaran divalidasi')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\Action::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn ($record) => $record->status === 'Menunggu Validasi')
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'Ditolak',
                            // 'validated_by' => auth()->id(),
                            // 'validated_at' => now(),
                        ]);

                        Notification::make()
                            ->title('Pembayaran ditolak')
                            ->danger()
                            ->send();
                    }),
                Tables\Actions\Action::make('lihat_bukti')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => asset('storage/' . $record->buktibayar))
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => $record->buktibayar)
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}
