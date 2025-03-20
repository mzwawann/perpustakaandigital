<?php

namespace App\Filament\Admin\Resources\AnggotaResource\Pages;

use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\AnggotaResource;

class EditAnggota extends EditRecord
{
    protected static string $resource = AnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('kembali')
                ->label('Kembali')
                ->color('info')
                ->url('http://127.0.0.1:8000/admin/anggotas') 
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}
