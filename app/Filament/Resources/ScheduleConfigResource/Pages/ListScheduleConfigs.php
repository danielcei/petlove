<?php

namespace App\Filament\Resources\ScheduleConfigResource\Pages;

use App\Filament\Resources\ScheduleConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScheduleConfigs extends ListRecords
{
    protected static string $resource = ScheduleConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
