<?php

namespace App\Filament\Resources\ClothCollectionResource\Pages;

use App\Filament\Resources\ClothCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClothCollections extends ManageRecords
{
    protected static string $resource = ClothCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
