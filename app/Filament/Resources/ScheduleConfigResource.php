<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleConfigResource\Pages;
use App\Filament\Resources\ScheduleConfigResource\RelationManagers;
use App\Models\ScheduleConfig;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleConfigResource extends Resource
{
    protected static ?string $model = ScheduleConfig::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function getNavigationGroup(): string
    {
        return __('Configurações de Agendamento');
    }

    public static function getNavigationLabel(): string
    {
        return __('Disponibilidade de Agendamento');
    }

    public static function getLabel(): string
    {
        return __('Disponibilidade de Agendamento');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('day_of_week')->label('Dia da Semana')
                    ->options([
                        'monday' => 'Segunda-Feira',
                        'tuesday' => 'Terça-Feira',
                        'wednesday' => 'Quarta-Feira',
                        'thursday' => 'Quinta-Feira',
                        'friday' => 'Sexta-Feira',
                        'saturday' => 'Sábado',
                        'sunday' => 'Domingo',
                    ])
                    ->required(),
                TimePicker::make('start_time')->label('Hora Inicial')->required(),
                TimePicker::make('end_time')->label('Hora Final')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day_of_week')
                    ->label('Dia da Semana')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'monday'    => 'Segunda-Feira',
                        'tuesday'   => 'Terça-Feira',
                        'wednesday' => 'Quarta-Feira',
                        'thursday'  => 'Quinta-Feira',
                        'friday'    => 'Sexta-Feira',
                        'saturday'  => 'Sábado',
                        'sunday'    => 'Domingo',
                        default     => ucfirst($state),
                    }),
                TextColumn::make('start_time')->label('Hora Inicial'),
                TextColumn::make('end_time')->label('Hora Final'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListScheduleConfigs::route('/'),
            'create' => Pages\CreateScheduleConfig::route('/create'),
            'edit' => Pages\EditScheduleConfig::route('/{record}/edit'),
        ];
    }
}
