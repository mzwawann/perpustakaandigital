<?php

namespace App\Filament\Admin\Resources\BukuResource\Pages;

use App\Filament\Admin\Resources\BukuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\Action;

class EditBuku extends EditRecord
{
    protected static string $resource = BukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('kembali')
                ->label('Kembali')
                ->color('info')
                ->url('http://127.0.0.1:8000/admin/bukus') 
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}
