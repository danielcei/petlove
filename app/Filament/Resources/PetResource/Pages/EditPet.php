<?php

namespace App\Filament\Resources\PetResource\Pages;

use App\Enums\StatusAppointment;
use App\Filament\Resources\PetResource;
use App\Models\Appointment;
use App\Services\AppointmentService;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditPet extends EditRecord
{
    protected static string $resource = PetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Action::make('schedule')
                ->label('Agendar Serviço')
                ->form([
                    DatePicker::make('date')
                        ->label('Data')
                        ->required()
                        ->reactive(),

                    Select::make('services')
                        ->label('Serviços')
                        ->multiple()
                        ->options(function ($record) {
                            if (!$record->animal) {
                                return [];
                            }

                            return $record->animal
                                ->services()
                                ->select('services.id', 'services.name')
                                ->pluck('services.name', 'services.id');
                        })
                        ->required()
                        ->reactive(),

                    Select::make('time')
                        ->label('Horário')
                        ->options(fn (callable $get) =>
                        (new AppointmentService)->getAvailableTimesForDate(
                            $get('date') ?? now()->toDateString(),
                            $get('services') ?? []
                        )->mapWithKeys(fn ($time) => [$time => $time])
                        )
                        ->required(),
                ])
                ->action(function (array $data, $record) {
                    $appointment = Appointment::create([
                        'user_id' => auth()->id(),
                        'pet_id' => $record->id,
                        'date' => $data['date'],
                        'time' => $data['time'],
                        'status' => StatusAppointment::STATUS_AGENDADO,
                    ]);
                    $appointment->services()->sync($data['services']);
                })
                ->icon('heroicon-o-calendar')
                ->color('primary'),
        ];
    }
}
