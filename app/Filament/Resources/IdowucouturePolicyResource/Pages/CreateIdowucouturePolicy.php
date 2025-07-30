<?php

namespace App\Filament\Resources\IdowucouturePolicyResource\Pages;

use App\Filament\Resources\IdowucouturePolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIdowucouturePolicy extends CreateRecord
{
    protected static string $resource = IdowucouturePolicyResource::class;

    public static function canCreateAnother(): bool
    {
        return false;
    }
}
