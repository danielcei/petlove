<?php

namespace App\Filament\Resources\PetResource\RelationManagers;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Resources\PetResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;


class AppointmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'appointments';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return AppointmentResource::form($form);
    }

    public function table(Table $table): Table
    {
        return AppointmentResource::table($table);
    }
  protected function canCreate(): bool
  {
      return true;
  }
}
