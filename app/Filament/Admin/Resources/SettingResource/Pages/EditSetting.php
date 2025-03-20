<?php

namespace App\Filament\Admin\Resources\SettingResource\Pages;

use App\Filament\Admin\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\Action;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('kembali')
            ->label('Kembali')
            ->color('info')
            ->url('http://127.0.0.1:8000/admin/settings') 
            ->icon('heroicon-o-arrow-left'),
        ];
    }
}
