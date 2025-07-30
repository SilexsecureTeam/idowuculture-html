<?php

namespace App\Filament\Resources\IdowucouturePolicyResource\Pages;

use App\Filament\Resources\IdowucouturePolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIdowucouturePolicies extends ListRecords
{
    protected static string $resource = IdowucouturePolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
             Actions\CreateAction::make()
            ->visible(fn () => $this->getResource()::getModel()::count() === 0)
                ->label('Add Policy'),
        ];
    }
}
