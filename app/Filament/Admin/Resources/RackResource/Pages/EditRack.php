<?php

namespace App\Filament\Admin\Resources\RackResource\Pages;

use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\RackResource;

class EditRack extends EditRecord
{
    protected static string $resource = RackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('kembali')
                ->label('Kembali')
                ->color('info')
                ->url('http://127.0.0.1:8000/admin/racks') 
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}
