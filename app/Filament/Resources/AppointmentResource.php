<?php

namespace App\Filament\Resources;

use App\Enums\StatusAppointment;
use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\SelectColumn;
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
        $Status = TextColumn::make('status')
            ->badge();
        if (auth()->user()->hasRole(['Admin', 'Backoffice'])) {
            $Status = SelectColumn::make('status2')
                ->label('Status')
                ->options(StatusAppointment::class)
                ->sortable()
                ->searchable();
        }

        return $table
            ->columns([
                TextColumn::make('pet_id')
                    ->label('Pet')
                    ->html()
                    ->formatStateUsing(function ($record) {
                        return view('components.tables.pet-info-column', [
                            'pet' => $record->pet,
                        ])->render();
                    }),
                TextColumn::make('user_id')
                    ->label('Dono (contato)')
                    ->html()
                    ->formatStateUsing(function ($record) {
                        return view('components.tables.user-info-column', [
                            'user' => $record->user,
                        ])->render();
                    }),
                Tables\Columns\TextColumn::make('date')->label('Data')->date(),
                Tables\Columns\TextColumn::make('time')->label('Horário'),
                $Status,
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
