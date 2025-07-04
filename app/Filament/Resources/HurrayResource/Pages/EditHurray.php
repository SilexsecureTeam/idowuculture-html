<?php

namespace App\Filament\Resources\HurrayResource\Pages;

use App\Filament\Resources\HurrayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHurray extends EditRecord
{
    protected static string $resource = HurrayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
