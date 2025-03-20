<?php

namespace App\Filament\Admin\Resources\PeminjamanResource\Pages;

use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\PeminjamanResource;

class EditPeminjaman extends EditRecord
{
    protected static string $resource = PeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('kembali')
                ->label('Kembali')
                ->color('info')
                ->url('http://127.0.0.1:8000/admin/peminjamen') 
                ->icon('heroicon-o-arrow-left'),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (
            array_key_exists('status', $data) &&
            $data['status'] === 'dikembalikan' &&
            (!array_key_exists('tanggal_pengembalian', $data) || !$data['tanggal_pengembalian'])
        ) {
            $data['tanggal_pengembalian'] = now()->toDateString();
        }

        return $data;
    }
}
