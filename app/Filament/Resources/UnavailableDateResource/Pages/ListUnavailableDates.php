<?php

namespace App\Filament\Resources\UnavailableDateResource\Pages;

use App\Filament\Resources\UnavailableDateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUnavailableDates extends ListRecords
{
    protected static string $resource = UnavailableDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
