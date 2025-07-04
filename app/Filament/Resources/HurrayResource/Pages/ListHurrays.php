<?php

namespace App\Filament\Resources\HurrayResource\Pages;

use App\Filament\Resources\HurrayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHurrays extends ListRecords
{
    protected static string $resource = HurrayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn() => $this->getResource()::getModel()::count() === 0)
                ->label('Add Hurray Page'),
        ];
    }
}
