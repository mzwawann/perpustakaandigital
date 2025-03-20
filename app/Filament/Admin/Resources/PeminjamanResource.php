<?php

namespace App\Filament\Admin\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\Buku;
use Filament\Tables;
use App\Models\Anggota;
use Filament\Forms\Form;
use App\Models\Peminjaman;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Exports\PeminjamanExport;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\PeminjamanResource\Pages;
use App\Filament\Admin\Resources\PeminjamanResource\RelationManagers;
use App\Models\User;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-uturn-right';
    protected static ?string $navigationGroup = 'Transaksi';

    public static function canDeleteAny(): bool
    {
        return false; 
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('buku_id')
                    ->label('Judul Buku')
                    ->options(Buku::pluck('judul_buku', 'id')) 
                    ->required(),

                Select::make('anggota_id')
                    ->label('Nama Anggota')
                    ->options(User::where('role', 'user')->pluck('name', 'id')->toArray())
                    ->required(),

                DatePicker::make('tanggal_peminjaman')
                    ->required()
                    ->label('Tanggal Peminjaman'),

                DatePicker::make('tanggal_pengembalian')
                    ->label('Tanggal Pengembalian') 
                    ->nullable()
                    ->disabled(),

                DatePicker::make('tanggal_harus_kembali')
                    ->required()
                    ->label('Tanggal Harus Kembali'),

                // Select::make('status')
                //     ->label('Status Peminjaman')
                //     ->options([
                //         'dipinjam' => 'Dipinjam',
                //         'dikembalikan' => 'Dikembalikan',
                //     ])
                //     ->required()
                //     ->reactive()
                //     ->afterStateUpdated(function ($state, callable $set) {
                //         if ($state === 'dikembalikan') {
                //             $set('tanggal_pengembalian', Carbon::now()->toDateTimeString());
                //         }
                //     }),
            ]);
    }

    public static function table(Table $table): Table
    {
       return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID peminjaman')
                    ->copyable(),
                TextColumn::make('buku.judul_buku')
                    ->label('Judul Buku')
                    ->sortable()
                    ->copyable()
                    ->searchable(),
                TextColumn::make('anggota.name')
                    ->label('Nama Anggota')
                    ->sortable()
                    ->copyable()
                    ->searchable(),
                TextColumn::make('tanggal_peminjaman')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin')
                    ->label('Tanggal Peminjaman')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('Y-m-d'))
                    ->sortable(),

                TextColumn::make('tanggal_pengembalian')
                    ->label('Tanggal Pengembalian')
                    ->getStateUsing(fn ($record) => $record->tanggal_pengembalian ? Carbon::parse($record->tanggal_pengembalian)->format('Y-m-d') : '-')
                    ->sortable()
                    ->searchable()    
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin'),

                TextColumn::make('tanggal_harus_kembali')
                    ->sortable()
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin')
                    ->label('Tanggal Harus Kembali')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('Y-m-d')),

                TextColumn::make('denda')
                    ->money('IDR', true)
                    ->copyable()
                    ->searchable(),
                TextColumn::make('status')
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'menunggu konfirmasi' => 'warning',
                        'dipinjam' => 'info',
                        'dikembalikan' => 'success',
                    })
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter Status') // Nama filter
                    ->options([
                        'menunggu konfirmasi' => 'Menunggu Konfirmasi',
                        'dipinjam' => 'Dipinjam',
                        'dikembalikan' => 'Dikembalikan',
                    ])
                    ->attribute('status'),
                Filter::make('Tanggal Peminjaman')
                    ->form([
                        DatePicker::make('start_date')->label('Dari Tanggal'),
                        DatePicker::make('end_date')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['start_date'] ?? null, fn ($query, $date) => $query->where('created_at', '>=', Carbon::parse($date)))
                            ->when($data['end_date'] ?? null, fn ($query, $date) => $query->where('created_at', '<=', Carbon::parse($date)));
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->button()
                ->modalHeading('Detail Peminjaman')
                ->modalButton('Tutup')
                ->modalActions([
                    Action::make('konfirmasi')
                        ->label('Konfirmasi')
                        ->icon('heroicon-o-check-circle')
                        ->color('info')
                        ->visible(fn ($record) => $record->status === 'menunggu konfirmasi')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            $record->update(['status' => 'dipinjam']);
                            Notification::make()
                                ->title('Peminjaman dikonfirmasi!')
                                ->success()
                                ->send();
                        }),
        
                        Action::make('dikembalikan')
                        ->label('Dikembalikan')
                        ->icon('heroicon-o-arrow-path')
                        ->color('success')
                        ->visible(fn ($record) => $record->status === 'dipinjam')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            // Hitung denda sebelum update
                            $denda = $record->hitungDenda(); 
                    
                            $record->update([
                                'status' => 'dikembalikan',
                                'tanggal_pengembalian' => Carbon::now(),
                                'denda' => $denda, // Simpan denda ke database
                            ]);
                    
                            Notification::make()
                                ->title('Buku telah dikembalikan!')
                                ->success()
                                ->send();
                        }),

                    Tables\Actions\Action::make('tutup')
                        ->label('Tutup')
                        ->color('gray')
                        ->action(fn () => redirect(request()->header('Referer'))), 
                ]),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Action::make('exportExcel')
                    ->label('Export All')
                    ->icon('heroicon-o-folder-arrow-down')
                    ->action(fn () => Excel::download(new PeminjamanExport(), 'laporan peminjaman all.xlsx')),
                Action::make('Export Excel')
                    ->label('Filter Export')
                    ->icon('heroicon-o-folder-arrow-down')
                    ->form([
                        DatePicker::make('start_date')->label('Dari Tanggal'),
                        DatePicker::make('end_date')->label('Sampai Tanggal'),
                        Select::make('nama_anggota')
                            ->label('Nama Anggota')
                            ->searchable()
                            ->options(User::where('role', 'user')->pluck('name', 'id')->toArray()),
                        Select::make('judul_buku')
                            ->label('Judul Buku')
                            ->searchable()
                            ->options(Buku::pluck('judul_buku', 'id')), 
                    ])
                    ->action(function (array $data) {
                        return response()->streamDownload(function () use ($data) {
                            echo Excel::raw(new PeminjamanExport($data['start_date'], $data['end_date'], $data['nama_anggota'],  $data['judul_buku']), \Maatwebsite\Excel\Excel::XLSX);
                        }, 'peminjaman.xlsx');
                    }),
            ]);
    }

    public static function prosesPengembalian($record)
    {
        // Update tanggal pengembalian ke sekarang
        $record->update([
            'tanggal_pengembalian' => Carbon::now(),
            'status' => 'dikembalikan',
        ]);

        // Denda akan otomatis dihitung karena event "saving()" di Model
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
            'index' => Pages\ListPeminjamen::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}   