<?php

namespace App\Filament\Resources;

use App\Enums\StatusAppointment;
use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Agendamentos';

    public static function getLabel(): string
    {
        return __('Agendamentos');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->label('Dono (contato)')
                    ->html()
                    ->formatStateUsing(function ($record) {
                        return view('components.tables.user-info-column', [
                            'user' => $record->user,
                        ])->render();
                    }),
                Tables\Columns\TextColumn::make('pet.name')->label('Pet')->searchable(),
                Tables\Columns\TextColumn::make('date')->label('Data')->date(),
                Tables\Columns\TextColumn::make('time')->label('Horário'),
                TextColumn::make('status')
                    ->badge(),
            ])
            ->filters([
            ])
            ->actions([
                ActionGroup::make([
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
            'index' => Pages\ListAppointments::route('/'),
        ];
    }
}
