<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables;
use Leandrocfe\FilamentPtbrFormFields\Money;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function getNavigationGroup(): string
    {
        return __('Administrativo');
    }

    public static function getNavigationLabel(): string
    {
        return __('Services');
    }

    public static function getLabel(): string
    {
        return __('Services');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Serviço')->required(),
                Money::make('price')->label('Preço')->prefix('R$')->required(),
                TextInput::make('duration_minutes')->label('Duração (mim)')->numeric()->required(),
                Select::make('animals')->label('Animais')
                    ->multiple()
                    ->relationship('animals', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('price')->money('BRL'),
                TextColumn::make('duration_minutes')->label('Duration (min)'),
                TextColumn::make('animals.name')->label('Allowed Animals')->limit(30),
            ])
            ->filters([
                SelectFilter::make('animals')->relationship('animals', 'name'),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->visible(fn($record): bool => self::canEdit($record)),
                    Tables\Actions\DeleteAction::make()
                        ->visible(fn($record): bool => self::canEdit($record)),
                ])
                    ->iconButton()
                    ->tooltip('Actions'),
            ])
            ->bulkActions([
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
