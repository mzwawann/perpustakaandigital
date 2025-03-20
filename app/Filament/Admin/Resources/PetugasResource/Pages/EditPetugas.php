<?php

namespace App\Filament\Admin\Resources\PetugasResource\Pages;

use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\PetugasResource;

class EditPetugas extends EditRecord
{
    protected static string $resource = PetugasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('kembali')
                ->label('Kembali')
                ->color('info')
                ->url('http://127.0.0.1:8000/admin/petugas') 
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}
