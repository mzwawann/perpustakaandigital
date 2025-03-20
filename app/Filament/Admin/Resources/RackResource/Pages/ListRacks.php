<?php

namespace App\Filament\Admin\Resources\RackResource\Pages;

use App\Filament\Admin\Resources\RackResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRacks extends ListRecords
{
    protected static string $resource = RackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
