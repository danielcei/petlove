<?php

namespace App\Filament\Resources\UnavailableDateResource\Pages;

use App\Filament\Resources\UnavailableDateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnavailableDate extends EditRecord
{
    protected static string $resource = UnavailableDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
