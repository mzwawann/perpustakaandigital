<?php

namespace App\Filament\Admin\Resources\PetugasResource\Pages;

use App\Filament\Admin\Resources\PetugasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPetugas extends ListRecords
{
    protected static string $resource = PetugasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
