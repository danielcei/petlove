<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\PetResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;


class PetsRelationManager extends RelationManager
{
    protected static string $relationship = 'pets';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return PetResource::form($form);
    }

    public function table(Table $table): Table
    {
        return PetResource::table($table);
    }
  protected function canCreate(): bool
  {
      return true;
  }
}
