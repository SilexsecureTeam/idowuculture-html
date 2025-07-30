<?php

namespace App\Filament\Resources\IdowucouturePolicyResource\Pages;

use App\Filament\Resources\IdowucouturePolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIdowucouturePolicy extends EditRecord
{
    protected static string $resource = IdowucouturePolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
