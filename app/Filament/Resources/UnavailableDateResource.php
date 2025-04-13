<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnavailableDateResource\Pages;
use App\Filament\Resources\UnavailableDateResource\RelationManagers;
use App\Models\UnavailableDate;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnavailableDateResource extends Resource
{
    protected static ?string $model = UnavailableDate::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function getNavigationGroup(): string
    {
        return __('Configurações de Agendamento');
    }

    public static function getNavigationLabel(): string
    {
        return __('Fériados');
    }

    public static function getLabel(): string
    {
        return __('Fériados');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date')->required(),
                TextInput::make('reason')->label('Reason (optional)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')
                    ->label('Data')
                    ->sortable()
                    ->date('d/m/Y'),
                TextColumn::make('reason')->label('Reason'),
            ])
            ->filters([
                Filter::make('future_only')
                    ->query(fn ($query) => $query->where('date', '>=', now()))
                    ->label('Upcoming'),
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUnavailableDates::route('/'),
            'create' => Pages\CreateUnavailableDate::route('/create'),
            'edit' => Pages\EditUnavailableDate::route('/{record}/edit'),
        ];
    }
}
